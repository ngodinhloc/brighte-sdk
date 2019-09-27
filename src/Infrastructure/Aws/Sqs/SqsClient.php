<?php

namespace Brighte\Infrastructure\Aws\Sqs;

use Enqueue\Sqs\SqsConnectionFactory;
use Enqueue\Sqs\SqsMessage;

class SqsClient implements SqsClientInterface
{

    /** @var \Enqueue\Sqs\SqsConnectionFactory */
    protected $factory;

    /** @var \Enqueue\Sqs\SqsContext */
    protected $context;

    /** @var \Enqueue\Sqs\SqsDestination */
    protected $queue;

    /** @var \Enqueue\Sqs\SqsConsumer */
    protected $consumer;

    /**
     * SqsClient constructor.
     *
     * @param \Brighte\Infrastructure\Aws\Sqs\SqsConfigInterface|null $config config
     */
    public function __construct(SqsConfigInterface $config = null)
    {
        $this->factory = new SqsConnectionFactory($config->toArray());
        $this->context = $this->factory->createContext();
        $this->queue = $this->context->createQueue($config->getQueue());
        $this->queue->setFifoQueue($config->isFifo());
        $this->consumer = $this->context->createConsumer($this->queue);
    }//end __construct()

    /**
     * @param string|null $body
     * @param string|null $groupId
     * @return \Enqueue\Sqs\SqsMessage|null
     * @throws \Interop\Queue\Exception
     * @throws \Interop\Queue\Exception\InvalidDestinationException
     * @throws \Interop\Queue\Exception\InvalidMessageException
     */
    public function publish(string $body = null, string $groupId = null)
    {
        $message = $this->context->createMessage($body);
        $message->setMessageGroupId($groupId);
        $this->context->createProducer()->send($this->queue, $message);

        return $message;
    }//end publish()

    /**
     * @param int $timeOut millisecond
     * @return \Enqueue\Sqs\SqsMessage|null
     */
    public function receive(int $timeOut = 1000)
    {
        return $this->consumer->receive($timeOut);
    }//end receive()

    public function acknowledge(SqsMessage $message = null)
    {
        $this->consumer->acknowledge($message);
    }//end acknowledge()

    public function reject(SqsMessage $message = null, bool $requeue = false)
    {
        $this->consumer->reject($message, $requeue);
    }//end reject()

}//end class
