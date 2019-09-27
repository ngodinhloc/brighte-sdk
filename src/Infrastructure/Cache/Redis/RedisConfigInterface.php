<?php

namespace Brighte\Infrastructure\Cache\Redis;

interface RedisConfigInterface
{

    /**
     * @return string[]
     */
    public function toArray(): array;

    /**
     * @return string|null
     */
    public function getScheme(): ?string;

    /**
     * @param string|null $scheme
     * @return \Brighte\Infrastructure\Cache\Redis\RedisConfig
     */
    public function setScheme(?string $scheme = null): RedisConfig;

    /**
     * @return string|null
     */
    public function getHost(): ?string;

    /**
     * @param string|null $host
     * @return \Brighte\Infrastructure\Cache\Redis\RedisConfig
     */
    public function setHost(?string $host = null): RedisConfig;

    /**
     * @return int|null
     */
    public function getPort(): ?int;

    /**
     * @param int|null $port
     * @return \Brighte\Infrastructure\Cache\Redis\RedisConfig
     */
    public function setPort(?int $port = null): RedisConfig;

}
