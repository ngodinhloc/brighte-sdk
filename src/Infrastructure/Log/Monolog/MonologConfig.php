<?php

declare(strict_types = 1);

namespace Brighte\Infrastructure\Log\Monolog;

class MonologConfig
{

    /** @var string */
    protected $configName;

    /** @var string */
    protected $name;

    /** @var string */
    protected $path;

    /** @var string|int */
    protected $level;

    /** @var bool */
    protected $sentry;

    /** @var string */
    protected $sentryDsn;

    /** @var string */
    protected $sentryPublicKey;

    /** @var string */
    protected $sentryHost;

    /** @var string */
    protected $sentryProjectId;

    /** @var string */
    protected $sentryEnvironment;

    /**
     * MonologConfig constructor.
     *
     * @param string|null $configName
     * @param array|null $config
     */
    public function __construct(string $configName = null, ?array $config = null)
    {
        $this->configName = $configName;
        $this->name = isset($config['name']) ? $config['name'] : null;
        $this->path = isset($config['path']) ? $config['path'] : null;
        $this->level = isset($config['level']) ? $config['level'] : null;
        $this->sentry = (isset($config['sentry']) && $config['sentry'] == "true") ? true : false;
        $this->sentryDsn = isset($config['sentry_dsn']) ? $config['sentry_dsn'] : null;
        $this->sentryPublicKey = isset($config['sentry_public_key']) ? $config['sentry_public_key'] : null;
        $this->sentryHost = isset($config['sentry_host']) ? $config['sentry_host'] : null;
        $this->sentryProjectId = isset($config['sentry_project_id']) ? $config['sentry_project_id'] : null;
        $this->sentryEnvironment = isset($config['sentry_environment']) ? $config['sentry_environment'] : null;
    }

    /**
     * @return array
     */
    public function getSentryConfig()
    {
        return [
            'dsn' => $this->sentryDsn,
            'public_key' => $this->sentryPublicKey,
            'host' => $this->sentryHost,
            'project_id' => $this->sentryProjectId,
            'environment' => $this->sentryEnvironment,
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return \Brighte\Infrastructure\Log\Monolog\MonologConfig
     */
    public function setName(string $name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return \Brighte\Infrastructure\Log\Monolog\MonologConfig
     */
    public function setPath(string $path = null)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int|string $level
     * @return \Brighte\Infrastructure\Log\Monolog\MonologConfig
     */
    public function setLevel($level = null)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSentry()
    {
        return $this->sentry;
    }

    /**
     * @param bool $sentry
     * @return \Brighte\Infrastructure\Log\Monolog\MonologConfig
     */
    public function setSentry(bool $sentry = null)
    {
        $this->sentry = $sentry;

        return $this;
    }

    /**
     * @return string
     */
    public function getSentryDsn()
    {
        return $this->sentryDsn;
    }

    /**
     * @param string $sentryDsn
     * @return \Brighte\Infrastructure\Log\Monolog\MonologConfig
     */
    public function setSentryDsn(string $sentryDsn = null)
    {
        $this->sentryDsn = $sentryDsn;

        return $this;
    }

    /**
     * @return string
     */
    public function getSentryPublicKey()
    {
        return $this->sentryPublicKey;
    }

    /**
     * @param string $sentryPublicKey
     * @return \Brighte\Infrastructure\Log\Monolog\MonologConfig
     */
    public function setSentryPublicKey(string $sentryPublicKey = null)
    {
        $this->sentryPublicKey = $sentryPublicKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getSentryHost()
    {
        return $this->sentryHost;
    }

    /**
     * @param string $sentryHost
     * @return \Brighte\Infrastructure\Log\Monolog\MonologConfig
     */
    public function setSentryHost(string $sentryHost = null)
    {
        $this->sentryHost = $sentryHost;

        return $this;
    }

    /**
     * @return string
     */
    public function getSentryProjectId()
    {
        return $this->sentryProjectId;
    }

    /**
     * @param string $sentryProjectId
     * @return \Brighte\Infrastructure\Log\Monolog\MonologConfig
     */
    public function setSentryProjectId(string $sentryProjectId = null)
    {
        $this->sentryProjectId = $sentryProjectId;

        return $this;
    }

    /**
     * @return string
     */
    public function getConfigName()
    {
        return $this->configName;
    }

    /**
     * @param string $configName
     * @return \Brighte\Infrastructure\Log\Monolog\MonologConfig
     */
    public function setConfigName(string $configName = null)
    {
        $this->configName = $configName;

        return $this;
    }

    /**
     * @return string
     */
    public function getSentryEnvironment()
    {
        return $this->sentryEnvironment;
    }

    /**
     * @param string $sentryEnvironment
     * @return \Brighte\Infrastructure\Log\Monolog\MonologConfig
     */
    public function setSentryEnvironment(string $sentryEnvironment = null)
    {
        $this->sentryEnvironment = $sentryEnvironment;

        return $this;
    }

}//end class
