<?php

namespace Iyzipay\Tests;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Locale;
use Iyzipay\Options;
use Iyzipay\Request;

class IyzipayResourceTest extends BaseTest
{
    public function test_should_get_http_headers()
    {
        $request = new Request();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");

        $options = new Options();
        $options->setApiKey("apiKey");
        $options->setSecretKey("secretKey");
        $options->setBaseUrl("baseUrl");

        $headers = parent::callMethod(new IyzipayResource(), "getHttpHeaders", array($request, $options));

        $this->assertNotEmpty($headers);
        $this->assertEquals(4, count($headers));
        $this->assertEquals("Accept: application/json", $headers[0]);
        $this->assertEquals("Content-type: application/json", $headers[1]);
        $this->assertStringStartsWith("Authorization: ", $headers[2]);
        $this->assertStringStartsWith("x-iyzi-rnd: ", $headers[3]);
    }

    public function test_should_prepare_authorization_string()
    {
        $request = new Request();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");

        $options = new Options();
        $options->setApiKey("apiKey");
        $options->setSecretKey("secretKey");
        $options->setBaseUrl("baseUrl");

        $str = parent::callMethod(new IyzipayResource(), "prepareAuthorizationString", array($request, $options, "rnd"));

        $this->assertEquals("IYZWS apiKey:opW0tI3yAVjzROFRTgHjIGsriHw=", $str);
    }
}