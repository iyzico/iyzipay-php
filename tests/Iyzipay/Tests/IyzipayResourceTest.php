<?php

namespace Iyzipay\Tests;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Locale;
use Iyzipay\Request;

class IyzipayResourceTest extends TestCase
{
    public function test_should_get_http_headers()
    {
        $request = new Request();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");

        $headers = parent::callMethod(new IyzipayResource(), "getHttpHeaders", array($request, $this->options));

        $this->assertNotEmpty($headers);
        $this->assertEquals(5, count($headers));
        $this->assertEquals("Accept: application/json", $headers[0]);
        $this->assertEquals("Content-type: application/json", $headers[1]);
        $this->assertStringStartsWith("Authorization: ", $headers[2]);
        $this->assertStringStartsWith("x-iyzi-rnd: ", $headers[3]);
        $this->assertStringStartsWith("x-iyzi-client-version: ", $headers[4]);
    }

    public function test_should_prepare_authorization_string()
    {
        $request = new Request();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");

        $str = parent::callMethod(new IyzipayResource(), "prepareAuthorizationString", array($request, $this->options, "rnd"));

        $this->assertEquals("IYZWS apiKey:opW0tI3yAVjzROFRTgHjIGsriHw=", $str);
    }
}