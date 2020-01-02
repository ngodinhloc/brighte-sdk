<?php

declare(strict_types = 1);

namespace Brighte\Infrastructure\Aws\Sns;

use Brighte\Infrastructure\Aws\Sns\Exceptions\SnsConfigException;
use ServiceSchema\Json\JsonReader;

class SnsConfigFactory
{

    /** @var string|null */
    protected $configFile;

    /** @var \stdClass */
    protected $configs;

    /**
     * SqsConfigFactory constructor.
     *
     * @param string|null $configFile
     * @throws \Brighte\Infrastructure\Aws\Sns\Exceptions\SnsConfigException
     * @throws \ServiceSchema\Json\Exception\JsonException
     */
    public function __construct(?string $configFile = null)
    {
        $this->configFile = $configFile;
        $this->loadConfigs();
    }

    /**
     * @throws \Brighte\Infrastructure\Aws\Sns\Exceptions\SnsConfigException
     * @throws \ServiceSchema\Json\Exception\JsonException
     */
    protected function loadConfigs(): void
    {
        if (!is_file($this->configFile)) {
            throw new SnsConfigException(SnsConfigException::INVALID_CONFIG_FILE . $this->configFile);
        }

        $this->configs = JsonReader::decode(JsonReader::read($this->configFile));
    }

    /**
     * @param string|null $connectionName
     * @return \Brighte\Infrastructure\Aws\Sns\SnsConfig
     * @throws \Brighte\Infrastructure\Aws\Sns\Exceptions\SnsConfigException
     */
    public function get(?string $connectionName = null): SnsConfig
    {
        if (!isset($this->configs->$connectionName)) {
            throw new SnsConfigException(SnsConfigException::INVALID_CONNECTION_NAME . $connectionName);
        }

        $configObject = $this->configs->$connectionName;
        $configArray = [];

        foreach ($configObject as $key => $para) {
            $configArray[$key] = getenv($para);
        }

        return new SnsConfig($connectionName, $configArray);
    }//end get()

}//end class
