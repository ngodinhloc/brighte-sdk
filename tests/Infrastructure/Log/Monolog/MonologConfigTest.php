<?php

namespace Brighte\Tests\Infrastructure\Log\Monolog;

use Brighte\Infrastructure\Log\Monolog\MonologConfig;
use PHPUnit\Framework\TestCase;

class MonologConfigTest extends TestCase
{

    /** @var string */
    protected $testDir;

    /** @var \Brighte\Infrastructure\Log\Monolog\MonologConfig */
    protected $config;

    public function setUp()
    {
        parent::setUp();
        $this->testDir = dirname(dirname(dirname(dirname(__FILE__))));
    }

    public function testConfig()
    {
        $array = [
            'name' => 'name',
            'path' => 'path',
            'level' => '100',
            'sentry' => true,
            'sentry_dsn' => 'dsn',
            'sentry_public_key' => null,
            'sentry_host' => 'sentry.io',
            'sentry_project_id' => null,
            'sentry_environment' => 'test',
        ];

        $config = new MonologConfig('test.config', $array);
        $this->assertEquals($config->getConfigName(), 'test.config');
        $this->assertEquals($config->getName(), 'name');
        $this->assertEquals($config->getPath(), 'path');
        $this->assertEquals($config->getLevel(), '100');
        $this->assertEquals($config->isSentry(), true);
        $this->assertEquals($config->getSentryDsn(), 'dsn');
        $this->assertEquals($config->getSentryPublicKey(), null);
        $this->assertEquals($config->getSentryHost(), 'sentry.io');
        $this->assertEquals($config->getSentryProjectId(), null);
        $this->assertEquals($config->getSentryEnvironment(), 'test');
        $this->assertEquals($config->getSentryConfig(),
            [
                'dsn' => $config->getSentryDsn(),
                'public_key' => $config->getSentryPublicKey(),
                'host' => $config->getSentryHost(),
                'project_id' => $config->getSentryProjectId(),
                'environment' => $config->getSentryEnvironment(),
            ]);
    }

    public function testGetterSetter()
    {
        $config = new MonologConfig('test.config', []);
        $config->setName('name')
            ->setPath('path')
            ->setLevel('100')
            ->setSentry(true)
            ->setSentryDsn('dsn')
            ->setSentryPublicKey(null)
            ->setSentryHost('sentry.io')
            ->setSentryProjectId(null)
            ->setSentryEnvironment('test');
        $this->assertEquals($config->getConfigName(), 'test.config');
        $this->assertEquals($config->getName(), 'name');
        $this->assertEquals($config->getPath(), 'path');
        $this->assertEquals($config->getLevel(), '100');
        $this->assertEquals($config->isSentry(), true);
        $this->assertEquals($config->getSentryDsn(), 'dsn');
        $this->assertEquals($config->getSentryPublicKey(), null);
        $this->assertEquals($config->getSentryHost(), 'sentry.io');
        $this->assertEquals($config->getSentryProjectId(), null);
        $this->assertEquals($config->getSentryEnvironment(), 'test');
        $this->assertEquals($config->getSentryConfig(),
            [
                'dsn' => $config->getSentryDsn(),
                'public_key' => $config->getSentryPublicKey(),
                'host' => $config->getSentryHost(),
                'project_id' => $config->getSentryProjectId(),
                'environment' => $config->getSentryEnvironment(),
            ]);
    }
}
