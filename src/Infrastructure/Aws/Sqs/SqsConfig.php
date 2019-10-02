<?php

declare(strict_types = 1);

namespace Brighte\Infrastructure\Aws\Sqs;

class SqsConfig
{

    /** @var string */
    protected $connectionName;

    /** @var string $key aws key */
    protected $key;

    /** @var string $secret aws secret */
    protected $secret;

    /** @var string $region aws region */
    protected $region;

    /** @var string $queue queue name */
    protected $queue;

    /** @var bool $fifo is fifo queue */
    protected $fifo = false;

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
        $this->queue = $config['queue'] ?? null;
        $this->fifo = isset($config['fifo']) ? (bool) $config['fifo'] : false;
    }

    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            'key' => $this->key,
            'secret' => $this->secret,
            'region' => $this->region,
            'queue' => $this->queue,
            'fifo' => $this->fifo,
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
     * @return SqsConfig
     */
    public function setConnectionName(string $connectionName): SqsConfig
    {
        $this->connectionName = $connectionName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param string|null $key
     * @return \Brighte\Infrastructure\Aws\Sqs\SqsConfig
     */
    public function setKey(string $key = null): SqsConfig
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * @param string|null $secret
     * @return \Brighte\Infrastructure\Aws\Sqs\SqsConfig
     */
    public function setSecret(string $secret = null): SqsConfig
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * @param string|null $region
     * @return \Brighte\Infrastructure\Aws\Sqs\SqsConfig
     */
    public function setRegion(string $region = null): SqsConfig
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQueue(): ?string
    {
        return $this->queue;
    }

    /**
     * @param string|null $queue
     * @return \Brighte\Infrastructure\Aws\Sqs\SqsConfig
     */
    public function setQueue(string $queue = null): SqsConfig
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function isFifo(): ?bool
    {
        return $this->fifo;
    }

    /**
     * @param bool|null $fifo
     * @return \Brighte\Infrastructure\Aws\Sqs\SqsConfig
     */
    public function setFifo(bool $fifo = null): SqsConfig
    {
        $this->fifo = $fifo;

        return $this;
    }

}
