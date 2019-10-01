<?php

namespace Brighte\Infrastructure\Database\Doctrine\Exceptions;

use Brighte\Exceptions\BaseException;

class DoctrineConfigException extends BaseException
{

    public const DOMAIN = 'Brighte\Infrastructure\Database\Doctrine';
    public const INVALID_CONFIG_FILE = 'Invalid config file: ';
    public const INVALID_CONNECTION_NAME = 'Unknown connection name: ';

}
