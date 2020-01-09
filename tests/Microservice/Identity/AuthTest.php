<?php
namespace Brighte\Test\Microservice\Identity;

use Brighte\Microservice\Identity\Auth;
use Brighte\Microservice\Identity\Exceptions\IdentityException;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use ReflectionClass;
use stdClass;

class AuthTest extends TestCase
{

    /**
     * @var Auth
     */
    protected $auth;

    /**
     * @var stdClass
     */
    protected $jwtPayload;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->auth = $this->createPartialMock(Auth::class, []);
        $this->jwtPayload = new stdClass;
        $this->jwtPayload->sub = 1234567890;
        $this->jwtPayload->name = 'danny test';
        $this->jwtPayload->iat = 1516239022;
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->auth);
        parent::tearDown();
    }

    public function testConfig()
    {
        $this->assertSame('abc', 'abc');
    }

    public function testRequestToken()
    {
        $mockResponse = new class {
            public function getBody(bool $bool): string
            {
                return json_encode([
                    'accessToken' => 'test_token'
                ]);
            }
        };

        $httpClient = $this->getMockBuilder(Client::class)
            ->setMethods(['post'])
            ->getMock();
        
        $httpClient->expects($this->exactly(2))
            ->method('post')
            ->willReturn($mockResponse);

        try {
            $this->auth->requestToken();
        } catch (IdentityException $exception) {
            $this->assertContains('Invalid API endpoint.', $exception->getMessage());
        }

        $this->auth->setApiEndpoint('test_end_point');
        $this->auth->setClient($httpClient);
        $this->assertEquals($this->auth->requestToken(), 'test_token');

        // test exception
        $httpClient->expects($this->exactly(1))
            ->method('post')
            ->willThrowException(new \Exception('test error'));
        try {
            $this->auth->requestToken();
        } catch (IdentityException $exception) {
            $this->assertContains('Failed to request token, please check your key. Error: test error', $exception->getMessage());
        }
    }

    public function testAuthenticate()
    {
        $testToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6ImRhbm55IHRlc3QiLCJpYXQiOjE1MTYyMzkwMjJ9.UVzuoK1BbkHSjrV0l3bYoKZWKg4G9dv_obKRkyixvvk';

        try {
            $this->auth->authenticate();
        } catch (IdentityException $exception) {
            $this->assertContains('Please check jwt secret, algorithm', $exception->getMessage());
        }

        $this->auth->setApiEndpoint('test_end_point');
        $this->auth->setJwtSecret('test-256-bit-secret');

        $class = new ReflectionClass($this->auth);
        $property = $class->getProperty('jwtAlg');
        $property->setAccessible(true);
        $property->setValue($this->auth, 'HS256');

        try {
            $this->auth->authenticate('xxxxx');
        } catch (IdentityException $exception) {
            $this->assertContains('Failed to authenticate token. Error: Wrong number of segments', $exception->getMessage());
        }

        $this->assertEquals($this->jwtPayload, $this->auth->authenticate($testToken));
    }

    public function testAuthorize()
    {
        try {
            $this->auth->authorize();
        } catch (IdentityException $exception) {
            $this->assertContains('Invalid JWT token', $exception->getMessage());
        }

        $this->assertEquals(true, $this->auth->authorize($this->jwtPayload));
        $this->assertEquals(false, $this->auth->authorize($this->jwtPayload, ['scope' => 123]));
        $this->jwtPayload->scope = ['scope' => 123];
        $this->assertEquals(true, $this->auth->authorize($this->jwtPayload, ['scope' => 123]));
    }
}