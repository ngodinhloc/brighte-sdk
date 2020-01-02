<?php

namespace Brighte\Infrastructure\Aws\Sns;

use Brighte\Sns\SnsConnectionFactory;

class SnsClient implements SnsClientInterface
{

    /** @var \Brighte\Infrastructure\Aws\Sns\SnsConfig */
    protected $config;

    /** @var \Brighte\Sns\SnsConnectionFactory */
    protected $factory;

    /** @var \Brighte\Sns\SnsContext */
    protected $context;

    /**
     * SqsClient constructor.
     *
     * @param \Brighte\Infrastructure\Aws\Sns\SnsConfig|null $config config
     */
    public function __construct(SnsConfig $config = null)
    {
        $this->config = $config;
        $this->factory = new SnsConnectionFactory($this->config->toArray());
        $this->context = $this->factory->createContext();
    }//end __construct()

    /**
     * @param string $topicName
     * @param string $body
     * @param array $properties
     * @return \Brighte\Sns\SnsMessage|\Interop\Queue\Message|mixed
     * @throws \Interop\Queue\Exception
     * @throws \Interop\Queue\Exception\InvalidDestinationException
     * @throws \Interop\Queue\Exception\InvalidMessageException
     */
    public function send(string $topicName, string $body, array $properties = [])
    {
        $topic = $this->context->createTopic($topicName);
        $this->context->declareTopic($topic);

        $message = $this->context->createMessage($body, $properties);
        $this->context->createProducer()->send($topic, $message);

        return $message;
    }//end publish()

}//end class
