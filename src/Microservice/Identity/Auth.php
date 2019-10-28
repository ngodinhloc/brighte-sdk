<?php

namespace Brighte\Microservice\Identity;

use Brighte\Microservice\Abstracts\AbstractApi;
use Brighte\Microservice\Identity\Exceptions\IdentityException;
use Firebase\JWT\JWT;
use GuzzleHttp\Exception\GuzzleException;

class Auth extends AbstractApi implements AuthInterface
{

    /**
     * @param string|null $key
     * @return mixed|false
     * @throws \Brighte\Microservice\Identity\Exceptions\IdentityException
     */
    public function requestToken(?string $key = null)
    {
        if (empty($this->apiEndpoint)) {
            throw new IdentityException(IdentityException::INVALID_API_ENDPOINT);
        }

        try {
            $request = $this->client->post(
                $this->composeUri(Discovery::ACTION_AUTHENTICATE),
                $this->composeHeaders(),
                $this->composeBody($key)
            );
            $response = $this->client->send($request);
            $json = json_decode($response->getBody(true));
            if (isset($json->accessToken)) {
                return $json->accessToken;
            }

            return false;
        } catch (\Exception $exception) {
            throw new IdentityException(IdentityException::FAILED_TO_REQUEST_TOKEN . $exception->getMessage());
        } catch (GuzzleException $exception) {
            throw new IdentityException(IdentityException::FAILED_TO_REQUEST_TOKEN . $exception->getMessage());
        }
    }

    /**
     * @param string|null $token
     * @return mixed|object
     * @throws \Brighte\Microservice\Identity\Exceptions\IdentityException
     */
    public function authenticate(?string $token = null)
    {
        if (empty($this->jwtSecret) || empty($this->jwtAlg)) {
            throw new IdentityException(IdentityException::INVALID_JWT_SETTINGS);
        }

        try {
            $decoded = JWT::decode($token, $this->jwtSecret, [$this->jwtAlg]);
        } catch (\Exception $exception) {
            throw new IdentityException(IdentityException::FAILED_TO_AUTHENTICATE_TOKEN . $exception->getMessage());
        }

        return $decoded;
    }

    /**
     * @param \stdClass|null $decodedToken
     * @param array $scope
     * @return bool
     * @throws \Brighte\Microservice\Identity\Exceptions\IdentityException
     */
    public function authorize(?\stdClass $decodedToken = null, array $scope = [])
    {
        if (empty($decodedToken)) {
            throw new IdentityException(IdentityException::INVALID_JWT_TOKEN);
        }

        if (empty($scope)) {
            return true;
        }

        if (empty($decodedToken->scope) || !is_array($decodedToken->scope)) {
            return false;
        }

        return count(array_intersect($scope, $decodedToken->scope)) > 0;
    }

    /**
     * @return array
     */
    protected function composeHeaders()
    {
        return [
            'type' => 'json',
            'Content-Type' => 'application/json; charset=UTF-8'
        ];
    }

    /**
     * @param string|null $key
     * @return false|string
     */
    protected function composeBody(?string $key = null)
    {
        $body = json_encode(['apiKey' => $key]);

        return $body;
    }

    /**
     * @param string|null $action
     * @return string
     */
    protected function composeUri(?string $action = null)
    {
        $uri = $this->apiEndpoint . $action;

        return $uri;
    }
}
