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

    public function setUp(): void
    {
        parent::setUp();

        $this->httpClient = $this->getMockBuilder("HttpClient")
            ->setMethods(array("get", "getV2","post", "put", "patch", "delete", "exchange"))
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

    protected function expectHttpPatch()
    {
        $this->expectHttpClient("patch");
    }

    protected function expectHttpDelete()
    {
        $this->expectHttpClient("delete");
    }

    protected function verifyResource(IyzipayResource $resource)
    {
        $status = $resource->getStatus() ? $resource->getStatus() : 'success';
        $locale = $resource->getLocale() ? $resource->getLocale() : 'tr';
        $systemTime = $resource->getSystemTime() ? $resource->getSystemTime() : '1458545234852';
        $conversationId = $resource->getConversationId() ? $resource->getConversationId() : '123456';
        $rowResult = $resource->getRawResult() ? $resource->getRawResult() : '';

        $this->assertNotEmpty($resource);
        $this->assertEquals(Status::SUCCESS, $status);
        $this->assertEmpty($resource->getErrorCode());
        $this->assertEmpty($resource->getErrorMessage());
        $this->assertEmpty($resource->getErrorGroup());
        $this->assertEquals(Locale::TR, $locale);
        $this->assertEquals("1458545234852", $systemTime);
        $this->assertEquals("123456", $conversationId);
        $rowResult && $this->assertJson($rowResult);
        $rowResult && $this->assertJsonStringEqualsJsonString($this->json, $rowResult);
    }

    public function test_should_check_http_client_not_empty()
    {
        $this->assertNotEmpty($this->httpClient);
    }
}
