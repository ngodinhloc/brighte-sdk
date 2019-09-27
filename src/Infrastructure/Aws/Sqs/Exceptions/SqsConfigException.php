<?php

namespace Brighte\Infrastructure\Aws\Sqs\Exceptions;

use Brighte\Exceptions\BaseException;

class SqsConfigException extends BaseException
{

    public const DOMAIN = 'Brighte\Infrastructure\Aws\Sqs';
    public const INVALID_CONFIG_FILE = 'Invalid config file: ';
    public const INVALID_CONNECTION_NAME = 'Unknown connection name: ';

}
