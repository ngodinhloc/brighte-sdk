<?php

namespace Brighte\Infrastructure\Log\Monolog\Exceptions;

use Brighte\Exceptions\BaseException;

class MonologConfigException extends BaseException
{

    public const DOMAIN = 'Brighte\Infrastructure\Database\Log';
    public const INVALID_CONFIG_FILE = 'Invalid config file: ';
    public const INVALID_CONNECTION_NAME = 'Unknown connection name: ';

}
