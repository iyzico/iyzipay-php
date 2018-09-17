<?php

namespace Iyzipay\Tests;

use Iyzipay\DefaultHttpClient;

class DefaultHttpClientTest extends \PHPUnit_Framework_TestCase
{
    private $curl;

    public function setUp()
    {
        $this->curl = $this->getMockBuilder("Curl")
            ->setMethods(array("exec"))
            ->getMock();
    }

    public function test_should_make_http_get()
    {
        $this->curl
            ->expects($this->once())
            ->method("exec")
            ->with("url", array(
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_VERBOSE => false,
                CURLOPT_HEADER => false
            ))
            ->willReturn("result");

        $result = DefaultHttpClient::create($this->curl)->get("url");

        $this->assertEquals("result", $result);
    }

    public function test_should_make_http_getV2()
    {
        $this->curl
            ->expects($this->once())
            ->method("exec")
            ->with("url", array(
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_VERBOSE => false,
                CURLOPT_HEADER => false,
                CURLOPT_HTTPHEADER => "header"
            ))
            ->willReturn("result");

        $result = DefaultHttpClient::create($this->curl)->getV2("url","header");

        $this->assertEquals("result", $result);
    }

    public function test_should_make_http_post()
    {
        $this->curl
            ->expects($this->once())
            ->method("exec")
            ->with("url", array(
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => "content",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_VERBOSE => false,
                CURLOPT_HEADER => false,
                CURLOPT_HTTPHEADER => "header"
            ))
            ->willReturn("result");

        $result = DefaultHttpClient::create($this->curl)->post("url", "header", "content");

        $this->assertEquals("result", $result);
    }

    public function test_should_make_http_put()
    {
        $this->curl
            ->expects($this->once())
            ->method("exec")
            ->with("url", array(
                CURLOPT_CUSTOMREQUEST => "PUT",
                CURLOPT_POSTFIELDS => "content",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_VERBOSE => false,
                CURLOPT_HEADER => false,
                CURLOPT_HTTPHEADER => "header"
            ))
            ->willReturn("result");

        $result = DefaultHttpClient::create($this->curl)->put("url", "header", "content");

        $this->assertEquals("result", $result);
    }

    public function test_should_make_http_delete()
    {
        $this->curl
            ->expects($this->once())
            ->method("exec")
            ->with("url", array(
                CURLOPT_CUSTOMREQUEST => "DELETE",
                CURLOPT_POSTFIELDS => "content",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_VERBOSE => false,
                CURLOPT_HEADER => false,
                CURLOPT_HTTPHEADER => "header"
            ))
            ->willReturn("result");

        $result = DefaultHttpClient::create($this->curl)->delete("url", "header", "content");

        $this->assertEquals("result", $result);
    }
}