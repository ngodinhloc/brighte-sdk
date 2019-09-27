<?php

namespace Brighte\Infrastructure\Cache\Redis;

class RedisConfig implements RedisConfigInterface
{

    /** @var string|null */
    protected $scheme;

    /** @var string|null */
    protected $host;

    /** @var int|null */
    protected $port;

    /**
     * RedisConfig constructor.
     *
     * @param string[]|null $config
     */
    public function __construct(?array $config = null)
    {
        $this->scheme = $config['scheme'] ?? null;
        $this->host = $config['host'] ?? null;
        $this->port = $config['port'] ?? null;
    }

    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            'scheme' => $this->scheme,
            'host' => $this->host,
            'port' => $this->port,
        ];
    }

    /**
     * @return string|null
     */
    public function getScheme(): ?string
    {
        return $this->scheme;
    }

    /**
     * @param string|null $scheme
     * @return \Brighte\Infrastructure\Cache\Redis\RedisConfig
     */
    public function setScheme(?string $scheme = null): RedisConfig
    {
        $this->scheme = $scheme;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHost(): ?string
    {
        return $this->host;
    }

    /**
     * @param string|null $host
     * @return \Brighte\Infrastructure\Cache\Redis\RedisConfig
     */
    public function setHost(?string $host = null): RedisConfig
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPort(): ?int
    {
        return $this->port;
    }

    /**
     * @param int|null $port
     * @return \Brighte\Infrastructure\Cache\Redis\RedisConfig
     */
    public function setPort(?int $port = null): RedisConfig
    {
        $this->port = $port;

        return $this;
    }

}
