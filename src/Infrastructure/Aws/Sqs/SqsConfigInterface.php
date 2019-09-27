<?php

declare(strict_types = 1);

namespace Brighte\Infrastructure\Aws\Sqs;

interface SqsConfigInterface
{

    /**
     * @return string[]
     */
    public function toArray(): array;

    /**
     * @return string|null
     */
    public function getKey(): ?string;

    /**
     * @param string|null $key
     * @return \Brighte\Infrastructure\Aws\Sqs\SqsConfig
     */
    public function setKey(string $key = null): SqsConfig;

    /**
     * @return string|null
     */
    public function getSecret(): ?string;

    /**
     * @param string|null $secret
     * @return \Brighte\Infrastructure\Aws\Sqs\SqsConfig
     */
    public function setSecret(string $secret = null): SqsConfig;

    /**
     * @return string|null
     */
    public function getRegion(): ?string;

    /**
     * @param string|null $region
     * @return \Brighte\Infrastructure\Aws\Sqs\SqsConfig
     */
    public function setRegion(string $region = null): SqsConfig;

    /**
     * @return string|null
     */
    public function getQueue(): ?string;

    /**
     * @param string|null $queue
     * @return \Brighte\Infrastructure\Aws\Sqs\SqsConfig
     */
    public function setQueue(string $queue = null): SqsConfig;

    /**
     * @return bool|null
     */
    public function isFifo(): ?bool;

    /**
     * @param bool|null $fifo
     * @return \Brighte\Infrastructure\Aws\Sqs\SqsConfig
     */
    public function setFifo(bool $fifo = null): SqsConfig;

}
