<?php

namespace Brighte\Infrastructure\Cache\Redis;

use Predis\Client;

class RedisClientFactory
{

    /** @var string */
    protected $configFile;

    /** @var \Brighte\Infrastructure\Cache\Redis\RedisConfigFactory */
    protected $configFactory;

    /**
     * RedisClientFactory constructor.
     *
     * @param string|null $configFile
     * @throws \Brighte\Infrastructure\Cache\Redis\Exceptions\RedisConfigException
     * @throws \ServiceSchema\Json\Exception\JsonException
     */
    public function __construct(?string $configFile = null)
    {
        $this->configFile = $configFile;
        $this->configFactory = new RedisConfigFactory($this->configFile);
    }

    /**
     * @param string|null $connection
     * @return \Predis\Client
     * @throws \Brighte\Infrastructure\Cache\Redis\Exceptions\RedisConfigException
     */
    public function create(?string $connection = null): Client
    {
        /** @var \Brighte\Infrastructure\Cache\Redis\RedisConfigInterface $config */
        $config = $this->configFactory->get($connection);

        return new Client($config->toArray());
    }

}
