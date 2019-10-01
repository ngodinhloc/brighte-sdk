<?php

namespace Brighte\Infrastructure\Database\Doctrine;

class DoctrineConfig
{

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

    /** @var string */
    protected $metadataDir;

    /** @var string */
    protected $ignoredNamespace;

    /**
     * DoctrineConfig constructor.
     *
     * @param array|null $config
     */
    public function __construct(?array $config = null)
    {
        $this->driver = $config['driver'] ?? null;
        $this->host = $config['host'] ?? null;
        $this->port = $config['port'] ?? null;
        $this->dbname = $config['dbname'] ?? null;
        $this->user = $config['user'] ?? null;
        $this->password = $config['password'] ?? null;
        $this->charset = $config['charset'] ?? null;
        $this->collation = $config['collation'] ?? null;
        $this->prefix = $config['prefix'] ?? null;
        $this->memory = (isset($config['memory']) && $config['memory'] == "true") ? true : false;
        $this->devMode = (isset($config['dev_mode']) && $config['dev_mode'] == "true") ? true : false;
        $this->cache = (isset($config['cache']) && $config['cache'] == "true") ? true : false;
        $this->cacheDir = $config['cache_dir'] ?? null;
        $this->metadataDir = $config['metadata_dirs'] ?? null;
        $this->ignoredNamespace = $config['ignored_namespace'] ?? null;
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
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * @param string $driver
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setDriver(string $driver): DoctrineConfig
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
    public function setHost(string $host): DoctrineConfig
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return string
     */
    public function getPort(): string
    {
        return $this->port;
    }

    /**
     * @param string $port
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setPort(string $port): DoctrineConfig
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @return string
     */
    public function getDbname(): string
    {
        return $this->dbname;
    }

    /**
     * @param string $dbname
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setDbname(string $dbname): DoctrineConfig
    {
        $this->dbname = $dbname;

        return $this;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setUser(string $user): DoctrineConfig
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setPassword(string $password): DoctrineConfig
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getCharset(): string
    {
        return $this->charset;
    }

    /**
     * @param string $charset
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setCharset(string $charset): DoctrineConfig
    {
        $this->charset = $charset;

        return $this;
    }

    /**
     * @return string
     */
    public function getCollation(): string
    {
        return $this->collation;
    }

    /**
     * @param string $collation
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setCollation(string $collation): DoctrineConfig
    {
        $this->collation = $collation;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setPrefix(string $prefix): DoctrineConfig
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMemory(): bool
    {
        return $this->memory;
    }

    /**
     * @param bool $memory
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setMemory(bool $memory): DoctrineConfig
    {
        $this->memory = $memory;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDevMode(): bool
    {
        return $this->devMode;
    }

    /**
     * @param bool $devMode
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setDevMode(bool $devMode): DoctrineConfig
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
    public function setCache(bool $cache): DoctrineConfig
    {
        $this->cache = $cache;

        return $this;
    }

    /**
     * @return string
     */
    public function getCacheDir(): string
    {
        return $this->cacheDir;
    }

    /**
     * @param string $cacheDir
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setCacheDir(string $cacheDir): DoctrineConfig
    {
        $this->cacheDir = $cacheDir;

        return $this;
    }

    /**
     * @return string
     */
    public function getMetadataDir(): ?string
    {
        return $this->metadataDir;
    }

    /**
     * @param string $metadataDir
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setMetadataDir(string $metadataDir): DoctrineConfig
    {
        $this->metadataDir = $metadataDir;

        return $this;
    }

    /**
     * @return string
     */
    public function getIgnoredNamespace(): string
    {
        return $this->ignoredNamespace;
    }

    /**
     * @param string $ignoredNamespace
     * @return \Brighte\Infrastructure\Database\Doctrine\DoctrineConfig
     */
    public function setIgnoredNamespace(string $ignoredNamespace): DoctrineConfig
    {
        $this->ignoredNamespace = $ignoredNamespace;

        return $this;
    }

}
