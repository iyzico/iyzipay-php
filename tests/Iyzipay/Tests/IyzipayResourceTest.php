<?php

namespace Iyzipay\Tests;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Locale;
use Iyzipay\Request;
use Iyzipay\Options;

class IyzipayResourceTest extends TestCase
{
    public function test_should_get_http_headers()
    {
        $options = new Options();
        $request = new Request();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");
        $url = $options->getBaseUrl() . "/payment/test";

        $headers = parent::callMethod(new IyzipayResource(), "getHttpHeadersV2", array($url, $request, $this->options));
        $this->assertNotEmpty($headers);
        $this->assertEquals(4, count($headers));
        $this->assertEquals("Accept: application/json", $headers[0]);
        $this->assertEquals("Content-type: application/json", $headers[1]);
        $this->assertStringStartsWith("Authorization: ", $headers[2]);
        $this->assertStringStartsWith("x-iyzi-client-version: ", $headers[3]);
    }

    public function test_should_prepare_authorization_string()
    {
        $options = new Options();
        $request = new Request();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");
        $uri = $options->getBaseUrl() . "/payment/test";
        $expected_hash = 'IYZWSv2 YXBpS2V5OmFwaUtleSZyYW5kb21LZXk6cm5kJnNpZ25hdHVyZTpkMDBiYWE0YjZkYzU5MzA0NzJlNGQyMmEzYzUwZmIwN2RlNTBiMGRmYjhmNWFmNWI5ZjczMTU4ZDZiMTg0ZmY2';

        $str = parent::callMethod(new IyzipayResource(), "prepareAuthorizationStringV2", array($uri, $request, $this->options, "rnd"));
        $this->assertEquals($expected_hash, $str);
    }
}