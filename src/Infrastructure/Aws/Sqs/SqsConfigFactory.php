<?php

declare(strict_types = 1);

namespace Brighte\Infrastructure\Aws\Sqs;

use Brighte\Infrastructure\Aws\Sqs\Exceptions\SqsConfigException;
use ServiceSchema\Json\JsonReader;

class SqsConfigFactory
{

    /** @var string|null */
    protected $configFile;

    /** @var \stdClass */
    protected $configs;

    public const SQS_CONNECTION_CRM = 'sqs.ms.crm';
    public const SQS_CONNECTION_PORTAL = 'sqs.portal';

    /**
     * SqsConfigFactory constructor.
     *
     * @param string|null $configFile
     * @throws \Brighte\Infrastructure\Aws\Sqs\Exceptions\SqsConfigException
     * @throws \ServiceSchema\Json\Exception\JsonException
     */
    public function __construct(?string $configFile = null)
    {
        $this->configFile = $configFile;
        $this->loadConfigs();
    }

    /**
     * @throws \Brighte\Infrastructure\Aws\Sqs\Exceptions\SqsConfigException
     * @throws \ServiceSchema\Json\Exception\JsonException
     */
    protected function loadConfigs(): void
    {
        if (!is_file($this->configFile)) {
            throw new SqsConfigException(SqsConfigException::INVALID_CONFIG_FILE . $this->configFile);
        }

        $this->configs = JsonReader::decode(JsonReader::read($this->configFile));
    }

    /**
     * @param string|null $connection
     * @return \Brighte\Infrastructure\Aws\Sqs\SqsConfigInterface
     * @throws \Brighte\Infrastructure\Aws\Sqs\Exceptions\SqsConfigException
     */
    public function get(?string $connection = null): SqsConfigInterface
    {
        if (!isset($this->configs->$connection)) {
            throw new SqsConfigException(SqsConfigException::INVALID_CONNECTION_NAME . $connection);
        }

        $configObject = $this->configs->$connection;
        $configArray = [];

        foreach ($configObject as $key => $para) {
            $configArray[$key] = getenv($para);
        }

        return new SqsConfig($configArray);
    }//end get()

}//end class
