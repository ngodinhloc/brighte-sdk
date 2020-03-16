<?php

declare(strict_types = 1);

namespace Brighte\Infrastructure\Aws\Sns;

class SnsConfig
{

    /** @var string */
    protected $connectionName;

    /** @var string $key aws key */
    protected $key;

    /** @var string $secret aws secret */
    protected $secret;

    /** @var string $region aws region */
    protected $region;

    /**
     * SqsConfig constructor.
     *
     * @param string|null $connectionName
     * @param array|null $config
     */
    public function __construct(?string $connectionName = null, ?array $config = null)
    {
        $this->connectionName = $connectionName;
        $this->key = $config['key'] ?? null;
        $this->secret = $config['secret'] ?? null;
        $this->region = $config['region'] ?? null;
    }

    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            'key' => $this->key,
            'secret' => $this->secret,
            'region' => $this->region
        ];
    }

    /**
     * @return string
     */
    public function getConnectionName(): string
    {
        return $this->connectionName;
    }

    /**
     * @param string $connectionName
     * @return SnsConfig
     */
    public function setConnectionName(string $connectionName): SnsConfig
    {
        $this->connectionName = $connectionName;

        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return SnsConfig
     */
    public function setKey(string $key): SnsConfig
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * @param string $secret
     * @return SnsConfig
     */
    public function setSecret(string $secret): SnsConfig
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     * @return SnsConfig
     */
    public function setRegion(string $region): SnsConfig
    {
        $this->region = $region;

        return $this;
    }
}
