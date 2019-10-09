<?php

declare(strict_types = 1);

namespace Brighte\Infrastructure\Aws\Sqs;

use Brighte\Sqs\SqsMessage;

interface SqsClientInterface
{

    /**
     * @param string $body
     * @param string $groupId
     * @param array|null $messageAttributes MessageAttributes
     * @return mixed
     */
    public function publish(string $body, string $groupId, array $messageAttributes = null);

    /**
     * @return \Brighte\Sqs\SqsMessage|mixed
     */
    public function receive();

    /**
     * @param \Brighte\Sqs\SqsMessage|null $message
     * @return mixed
     */
    public function acknowledge(SqsMessage $message = null);

    /**
     * @param \Brighte\Sqs\SqsMessage|null $message
     * @param bool $requeue
     * @return mixed
     */
    public function reject(SqsMessage $message = null, bool $requeue = false);

}//end interface
