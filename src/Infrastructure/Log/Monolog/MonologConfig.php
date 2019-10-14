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
        $this->name = $config['name'] ?? null;
        $this->path = $config['path'] ?? null;
        $this->level = $config['level'] ?? null;
        $this->sentry = (isset($config['sentry']) && $config['sentry'] == "true") ? true : false;
        $this->sentryDsn = $config['sentry_dsn'] ?? null;
        $this->sentryPublicKey = $config['sentry_public_key'] ?? null;
        $this->sentryHost = $config['sentry_host'] ?? null;
        $this->sentryProjectId = $config['sentry_project_id'] ?? null;
        $this->sentryEnvironment = $config['sentry_environment'] ?? null;
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
     * @return MonologConfig
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
     * @return MonologConfig
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
     * @return MonologConfig
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
     * @return MonologConfig
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
     * @return MonologConfig
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
     * @return MonologConfig
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
     * @return MonologConfig
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
     * @return MonologConfig
     */
    public function setSentryProjectId(string $sentryProjectId = null)
    {
        $this->sentryProjectId = $sentryProjectId;

        return $this;
    }
}//end class
