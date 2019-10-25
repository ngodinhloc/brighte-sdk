<?php

namespace Brighte\Microservice\Identity;

use Brighte\Microservice\Abstracts\AbstractApi;
use Brighte\Microservice\Identity\Exceptions\IdentityException;
use Firebase\JWT\JWT;

class Api extends AbstractApi implements AuthenticateInterface
{

    /**
     * @return mixed|object
     * @throws \Brighte\Microservice\Identity\Exceptions\IdentityException
     */
    public function authenticate()
    {
        if (empty($this->jwtToken) || empty($this->jwtSecret) || empty($this->jwtAlg)) {
            throw new IdentityException(IdentityException::INVALID_JWT_SETTINGS);
        }

        try {
            $decoded = JWT::decode($this->jwtToken, $this->jwtSecret, [$this->jwtAlg]);
        } catch (\Exception $exception) {
            throw new IdentityException(IdentityException::FAILED_TO_AUTHENTICATE_TOKEN . $exception->getMessage());
        }

        return $decoded;
    }

    /**
     * @param string|null $key
     * @return $this
     * @throws \Brighte\Microservice\Identity\Exceptions\IdentityException
     */
    public function requestToken(?string $key = null)
    {
        try {
            $request = $this->client->post(
                $this->composeUri(Discovery::ACTION_AUTHENTICATE),
                $this->composeHeaders(),
                $this->composeBody($key)
            );
            $response = $this->client->send($request);
            $json = json_decode($response->getBody(true));
            if ($json->accessToken) {
                $this->jwtToken = $json->accessToken;
            }
        } catch (\Exception $exception) {
            throw new IdentityException(IdentityException::FAILED_TO_REQUEST_TOKEN . $exception->getMessage());
        }

        return $this;
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
