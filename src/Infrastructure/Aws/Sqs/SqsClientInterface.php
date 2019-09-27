<?php

declare(strict_types = 1);

namespace Brighte\Infrastructure\Aws\Sqs;

use Enqueue\Sqs\SqsMessage;

interface SqsClientInterface
{

    /**
     * @param string|null $body
     * @param string|null $groupId
     * @return mixed
     */
    public function publish(string $body = null, string $groupId = null);

    /**
     * @return mixed
     */
    public function receive();

    /**
     * @param \Enqueue\Sqs\SqsMessage|null $message
     * @return mixed
     */
    public function acknowledge(SqsMessage $message = null);

    /**
     * @param \Enqueue\Sqs\SqsMessage|null $message
     * @param bool $requeue
     * @return mixed
     */
    public function reject(SqsMessage $message = null, bool $requeue = false);

}//end interface
