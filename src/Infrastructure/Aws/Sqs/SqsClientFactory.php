<?php

namespace Brighte\Infrastructure\Aws\Sqs;

class SqsClientFactory
{

    /** @var string */
    protected $configFile;

    /** @var \Brighte\Infrastructure\Aws\Sqs\SqsConfigFactory */
    protected $configFactory;

    /**
     * SqsClientFactory constructor.
     *
     * @param string|null $configFile
     * @throws \Brighte\Infrastructure\Aws\Sqs\Exceptions\SqsConfigException
     * @throws \ServiceSchema\Json\Exception\JsonException
     */
    public function __construct(?string $configFile = null)
    {
        $this->configFile = $configFile;
        $this->configFactory = new SqsConfigFactory($this->configFile);
    }

    /**
     * @param string|null $connectionName
     * @return \Brighte\Infrastructure\Aws\Sqs\SqsClientInterface
     * @throws \Brighte\Infrastructure\Aws\Sqs\Exceptions\SqsConfigException
     */
    public function create(?string $connectionName = null): SqsClientInterface
    {
        /** @var \Brighte\Infrastructure\Aws\Sqs\SqsConfig $config */
        $config = $this->configFactory->get($connectionName);

        return new SqsClient($config);
    }//end create()

}//end class
