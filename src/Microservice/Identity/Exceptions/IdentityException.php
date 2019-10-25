<?php

namespace Brighte\Microservice\Identity\Exceptions;

use Brighte\Exceptions\BaseException;

class IdentityException extends BaseException
{

    public const DOMAIN = 'Brighte\Microservice\Identity';
    public const INVALID_JWT_SETTINGS = 'Please check jwt token, secret, algorithm';
    public const FAILED_TO_REQUEST_TOKEN = 'Failed to request token, please check your key. Error: ';
    public const FAILED_TO_AUTHENTICATE_TOKEN = 'Failed to authenticate token. Error: ';

}
