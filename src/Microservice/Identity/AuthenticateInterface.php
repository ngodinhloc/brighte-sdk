<?php

namespace Brighte\Microservice\Identity;

interface AuthenticateInterface
{

    /**
     * @return mixed
     * @throws \Exception
     */
    public function authenticate();

}
