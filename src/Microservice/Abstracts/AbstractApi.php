<?php

namespace Brighte\Microservice\Abstracts;

use Guzzle\Http\Client;

abstract class AbstractApi
{

    /** @var \Guzzle\Http\Client */
    protected $client;

    /** @var string */
    protected $apiEndpoint;

    /** @var string */
    protected $jwtToken;

    /** @var string */
    protected $jwtSecret;

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
     * @return \Guzzle\Http\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param \Guzzle\Http\Client $client
     * @return AbstractApi
     */
    public function setClient(\Guzzle\Http\Client $client)
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
     * @return AbstractApi
     */
    public function setApiEndpoint(string $apiEndpoint)
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
     * @return AbstractApi
     */
    public function setJwtSecret(string $jwtSecret)
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
     * @return AbstractApi
     */
    public function setJwtToken(string $jwtToken)
    {
        $this->jwtToken = $jwtToken;

        return $this;
    }
}
