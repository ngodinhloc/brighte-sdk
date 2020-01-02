<?php

namespace Brighte\Infrastructure\Aws\Sns;

class SnsClientFactory
{

    /** @var string */
    protected $configFile;

    /** @var \Brighte\Infrastructure\Aws\Sns\SnsConfigFactory */
    protected $configFactory;

    /**
     * SqsClientFactory constructor.
     *
     * @param string|null $configFile
     * @throws \Brighte\Infrastructure\Aws\Sns\Exceptions\SnsConfigException
     * @throws \ServiceSchema\Json\Exception\JsonException
     */
    public function __construct(?string $configFile = null)
    {
        $this->configFile = $configFile;
        $this->configFactory = new SnsConfigFactory($this->configFile);
    }

    /**
     * @param string|null $connectionName
     * @return \Brighte\Infrastructure\Aws\Sns\SnsClientInterface
     * @throws \Brighte\Infrastructure\Aws\Sns\Exceptions\SnsConfigException
     */
    public function create(?string $connectionName = null): SnsClientInterface
    {
        /** @var \Brighte\Infrastructure\Aws\Sns\SnsConfig $config */
        $config = $this->configFactory->get($connectionName);

        return new SnsClient($config);
    }//end create()

}//end class
