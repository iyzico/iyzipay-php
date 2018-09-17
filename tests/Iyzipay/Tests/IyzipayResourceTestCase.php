<?php

namespace Iyzipay\Tests;

use Iyzipay\ApiResource;
use Iyzipay\IyzipayResource;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Status;

class IyzipayResourceTestCase extends TestCase
{
    protected $httpClient;
    protected $json = '
        {
            "status":"success",
            "errorCode":null,
            "errorMessage":null,
            "errorGroup":null,
            "locale":"tr",
            "systemTime":"1458545234852",
            "conversationId":"123456"
        }';

    public function setUp()
    {
        parent::setUp();

        $this->httpClient = $this->getMockBuilder("HttpClient")
            ->setMethods(array("get", "getV2","post", "put", "delete", "exchange"))
            ->getMock();

        ApiResource::setHttpClient($this->httpClient);
    }

    protected function expectHttpClient($method)
    {
        $this->httpClient->expects($this->once())
            ->method($method)
            ->withAnyParameters()
            ->willReturn($this->json);
    }

    protected function expectHttpGet()
    {
        $this->expectHttpClient("get");
    }

    protected function expectHttpGetV2()
    {
        $this->expectHttpClient("getV2");
    }

    protected function expectHttpPost()
    {
        $this->expectHttpClient("post");
    }

    protected function expectHttpPut()
    {
        $this->expectHttpClient("put");
    }

    protected function expectHttpDelete()
    {
        $this->expectHttpClient("delete");
    }

    protected function verifyResource(IyzipayResource $resource)
    {
        $this->assertNotEmpty($resource);
        $this->assertEquals(Status::SUCCESS, $resource->getStatus());
        $this->assertEmpty($resource->getErrorCode());
        $this->assertEmpty($resource->getErrorMessage());
        $this->assertEmpty($resource->getErrorGroup());
        $this->assertEquals(Locale::TR, $resource->getLocale());
        $this->assertEquals("1458545234852", $resource->getSystemTime());
        $this->assertEquals("123456", $resource->getConversationId());
        $this->assertJson($resource->getRawResult());
        $this->assertJsonStringEqualsJsonString($this->json, $resource->getRawResult());
    }

    public function test_should_check_http_client_not_empty()
    {
        $this->assertNotEmpty($this->httpClient);
    }
}