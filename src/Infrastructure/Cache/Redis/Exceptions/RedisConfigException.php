<?php

namespace Brighte\Infrastructure\Cache\Redis\Exceptions;

use Brighte\Exceptions\BaseException;

class RedisConfigException extends BaseException
{

    public const DOMAIN = 'Brighte\Infrastructure\Cache\Redis';
    public const INVALID_CONFIG_FILE = 'Invalid config file: ';
    public const INVALID_CONNECTION_NAME = 'Unknown connection name: ';

}
