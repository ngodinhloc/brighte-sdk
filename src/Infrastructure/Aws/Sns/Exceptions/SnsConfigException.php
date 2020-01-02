<?php

namespace Brighte\Infrastructure\Aws\Sns\Exceptions;

use Brighte\Exceptions\BaseException;

class SnsConfigException extends BaseException
{

    public const DOMAIN = 'Brighte\Infrastructure\Aws\Sns';
    public const INVALID_CONFIG_FILE = 'Invalid config file: ';
    public const INVALID_CONNECTION_NAME = 'Unknown connection name: ';

}
