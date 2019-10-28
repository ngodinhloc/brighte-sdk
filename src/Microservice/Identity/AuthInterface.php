<?php

namespace Brighte\Microservice\Identity;

interface AuthInterface
{

    /**
     * @param string|null $key
     * @return mixed
     * @throws \Brighte\Microservice\Identity\Exceptions\IdentityException
     */
    public function requestToken(?string $key = null);

    /**
     * @param string|null $token
     * @return mixed|object
     * @throws \Brighte\Microservice\Identity\Exceptions\IdentityException
     */
    public function authenticate(?string $token = null);

    /**
     * @param \stdClass|null $decodedToken
     * @param array $scope
     * @return bool
     * @throws \Brighte\Microservice\Identity\Exceptions\IdentityException
     */
    public function authorize(?\stdClass $decodedToken = null, array $scope = []);

}
