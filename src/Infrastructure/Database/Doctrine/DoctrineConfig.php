<?php

namespace Brighte\Infrastructure\Database\Doctrine;

class DoctrineConfig
{

    /** @var string */
    protected $connectionName;

    /** @var string */
    protected $driver;

    /** @var string */
    protected $host;

    /** @var string */
    protected $port;

    /** @var string */
    protected $dbname;

    /** @var string */
    protected $user;

    /** @var string */
    protected $password;

    /** @var string */
    protected $charset;

    /** @var string */
    protected $collation;

    /** @var string */
    protected $prefix;

    /** @var bool in-memory database (for pdo_sqlite) */
    protected $memory;

    /** @var bool */
    protected $devMode;

    /** @var bool */
    protected $cache;

    /** @var string */
    protected $cacheDir;

    /** @var array */
    protected $metadataDirs;

    /** @var array */
    protected $ignoredNamespaces;

    /**
     * DoctrineConfig constructor.
     *
     * @param string|null $connectionName
     * @param array|null $config
     */
    public function __construct(?string $connectionName = null, ?array $config = null)
    {
        $this->connectionName = $connectionName;
        $this->driver = $config['driver'] ?? null;
        $this->host = $config['host'] ?? null;
        $this->port = $config['port'] ?? null;
        $this->dbname = $config['dbname'] ?? null;
        $this->user = $config['user'] ?? null;
        $this->password = $config['password'] ?? null;
        $this->charset = $config['charset'] ?? null;
        $this->collation = $config['collation'] ?? null;
        $this->prefix = $config['prefix'] ?? null;
        $this->cacheDir = $config['cache_dir'] ?? null;
        $this->memory = (isset($config['memory']) && $config['memory'] == "true") ? true : false;
        $this->devMode = (isset($config['dev_mode']) && $config['dev_mode'] == "true") ? true : false;
        $this->cache = (isset($config['cache']) && $config['cache'] == "true") ? true : false;
        $this->metadataDirs = isset($config['metadata_dirs']) ? explode(',', $config['metadata_dirs']) : null;
        $this->ignoredNamespaces = isset($config['ignored_namespaces']) ? explode(',', $config['ignored_namespaces']) : null;
    }

    /**
     * @return array
     */
    public function getConnection()
    {
        return [
            'driver' => $this->driver,
            'host' => $this->host,
            'port' => $this->port,
            'dbname' => $this->dbname,
            'user' => $this->user,
            'password' => $this->password,
            'charset' => $this->charset,
            'collation' => $this->collation,
            'prefix' => $this->prefix,
            'memory' => $this->memory,
        ];
    }

    /**
     * @return string
     */
    public function getConnectionName()
    {
        return $this->connectionName;
    }

    /**
     * @param string $connectionName
     * @return DoctrineConfig
     */
    public function setConnectionName(string $connectionName = null)
    {
        $this->connectionName = $connectionName;

        return $this;
    }

    /**
     * @return string
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @param string $driver
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setDriver(string $driver = null)
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setHost(string $host = null)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param string $port
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setPort(string $port = null)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @return string
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * @param string $dbname
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setDbname(string $dbname = null)
    {
        $this->dbname = $dbname;

        return $this;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setUser(string $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setPassword(string $password = null)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * @param string $charset
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setCharset(string $charset = null)
    {
        $this->charset = $charset;

        return $this;
    }

    /**
     * @return string
     */
    public function getCollation()
    {
        return $this->collation;
    }

    /**
     * @param string $collation
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setCollation(string $collation)
    {
        $this->collation = $collation;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setPrefix(string $prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMemory()
    {
        return $this->memory;
    }

    /**
     * @param bool $memory
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setMemory(bool $memory)
    {
        $this->memory = $memory;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDevMode()
    {
        return $this->devMode;
    }

    /**
     * @param bool $devMode
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setDevMode(bool $devMode)
    {
        $this->devMode = $devMode;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCache(): bool
    {
        return $this->cache;
    }

    /**
     * @param bool $cache
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setCache(bool $cache)
    {
        $this->cache = $cache;

        return $this;
    }

    /**
     * @return array
     */
    public function getCacheDir()
    {
        return $this->cacheDir;
    }

    /**
     * @param string $cacheDir
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setCacheDir(string $cacheDir = null)
    {
        $this->cacheDir = $cacheDir;

        return $this;
    }

    /**
     * @return array
     */
    public function getMetadataDirs()
    {
        return $this->metadataDirs;
    }

    /**
     * @param array $metadataDirs
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setMetadataDirs(array $metadataDirs = null)
    {
        $this->metadataDirs = $metadataDirs;

        return $this;
    }

    /**
     * @return array
     */
    public function getIgnoredNamespaces()
    {
        return $this->ignoredNamespaces;
    }

    /**
     * @param string $ignoredNamespacess
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setIgnoredNamespaces(string $ignoredNamespacess = null)
    {
        $this->ignoredNamespaces = $ignoredNamespacess;

        return $this;
    }

}
