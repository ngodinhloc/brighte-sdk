<?php

namespace Brighte\Microservice\Abstracts;

use GuzzleHttp\Client;

abstract class AbstractApi
{

    /** @var \GuzzleHttp\Client */
    protected $client;

    /** @var string */
    protected $apiEndpoint;

    /** @var string */
    protected $jwtToken;

    /** @var string */
    protected $jwtSecret;

    /** @var string */
    protected $jwtAlg;

    /**
     * AbstractApi constructor.
     *
     * @param string|null $apiEndpoint
     * @param array|null $jwtSettings
     */
    public function __construct(?string $apiEndpoint = null, array $jwtSettings = null)
    {
        $this->apiEndpoint = $apiEndpoint;
        $this->jwtToken = isset($jwtSettings['token']) ? $jwtSettings['token'] : null;
        $this->jwtSecret = isset($jwtSettings['secret']) ? $jwtSettings['secret'] : null;
        $this->jwtAlg = isset($jwtSettings['alg']) ? $jwtSettings['alg'] : null;
        $this->client = new Client();
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param \GuzzleHttp\Client $client
     * @return \Brighte\Microservice\Abstracts\AbstractApi
     */
    public function setClient(Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiEndpoint()
    {
        return $this->apiEndpoint;
    }

    /**
     * @param string $apiEndpoint
     * @return \Brighte\Microservice\Abstracts\AbstractApi
     */
    public function setApiEndpoint(string $apiEndpoint = null)
    {
        $this->apiEndpoint = $apiEndpoint;

        return $this;
    }

    /**
     * @return string
     */
    public function getJwtSecret()
    {
        return $this->jwtSecret;
    }

    /**
     * @param string $jwtSecret
     * @return \Brighte\Microservice\Abstracts\AbstractApi
     */
    public function setJwtSecret(string $jwtSecret = null)
    {
        $this->jwtSecret = $jwtSecret;

        return $this;
    }

    /**
     * @return string
     */
    public function getJwtToken()
    {
        return $this->jwtToken;
    }

    /**
     * @param string $jwtToken
     * @return \Brighte\Microservice\Abstracts\AbstractApi
     */
    public function setJwtToken(string $jwtToken = null)
    {
        $this->jwtToken = $jwtToken;

        return $this;
    }
}
