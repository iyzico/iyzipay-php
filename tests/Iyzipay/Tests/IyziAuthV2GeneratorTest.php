<?php

namespace Iyzipay\Tests;

use Iyzipay\IyziAuthV2Generator;
use Iyzipay\Request;

class IyziAuthV2GeneratorTest extends TestCase
{
    public function test_should_generate_auth_content_default()
    {
        $uri = 'https://api.iyzipay.com/Iyzilink/v2/Iyzilink/products/';
        $apiKey = 'test';
        $secretKey = 'test';
        $randomString = '123456789';
        $request = new Request();

        $iyziAuthV2Generator = new IyziAuthV2Generator();
        $result = $iyziAuthV2Generator->generateAuthContent($uri, $apiKey, $secretKey, $randomString, $request);
        $authContent = "YXBpS2V5OnRlc3QmcmFuZG9tS2V5OjEyMzQ1Njc4OSZzaWduYXR1cmU6OGM2NzI5MGYwMGZjN2FjOGE2NDczZDQ3OGEyMmRmYjY5YzgxNzFjZjc5Mzk4NDVmNzdiMWQwYjNmODQ3MGQ1MA==";

        $this->assertEquals($authContent, $result);
    }


    public function test_should_generate_auth_content_parameters()
    {
        $uri = 'https://api.iyzipay.com/Iyzilink/v2/Iyzilink/products/?locale=tr&page=1&count=100&conversationId=123456';
        $apiKey = 'test';
        $secretKey = 'test';
        $randomString = '123456789';
        $request = new Request();

        $iyziAuthV2Generator = new IyziAuthV2Generator();
        $result = $iyziAuthV2Generator->generateAuthContent($uri, $apiKey, $secretKey, $randomString, $request);
        $authContent = "YXBpS2V5OnRlc3QmcmFuZG9tS2V5OjEyMzQ1Njc4OSZzaWduYXR1cmU6YjE4NjFmMDBjNmE3NzljMTRmODA0ZTIwOTJhYjEwNjkxMDA2ODU2OWYwNzVjY2M5OWY2NzAwMjhmZjYzYTllNg==";

        $this->assertEquals($authContent, $result);
    }

    public function test_should_generate_auth_content_no_parameters()
    {
        $uri = 'https://api.iyzipay.com/Iyzilink/v2';
        $apiKey = 'test';
        $secretKey = 'test';
        $randomString = '123456789';
        $request = new Request();

        $iyziAuthV2Generator = new IyziAuthV2Generator();
        $result = $iyziAuthV2Generator->generateAuthContent($uri, $apiKey, $secretKey, $randomString, $request);
        $authContent = "YXBpS2V5OnRlc3QmcmFuZG9tS2V5OjEyMzQ1Njc4OSZzaWduYXR1cmU6ZWUyNjM0NTA5MTg2ODhlN2IzNzg2ODI3YjhjMGZiMDQ1YzhiODgyYTQwMjJiOWIwNWM1ODlhMjYwOTYzMGM2ZA==";

        $this->assertEquals($authContent, $result);
    }

    public function test_should_generate_subscription_auth_content_no_body_with_get_parameters()
    {
        $uri = 'https://api.iyzipay.com/v2/subscription/customers/?page=1&count=10';
        $apiKey = 'test';
        $secretKey = 'test';
        $randomString = '123456789';
        $request = new Request();

        $iyziAuthV2Generator = new IyziAuthV2Generator();
        $result = $iyziAuthV2Generator->generateAuthContent($uri, $apiKey, $secretKey, $randomString, $request);
        $authContent = "YXBpS2V5OnRlc3QmcmFuZG9tS2V5OjEyMzQ1Njc4OSZzaWduYXR1cmU6MjAyYjcwNDgzYjdlN2EwNDI5MTFkZjZlY2VjNzU2MmQyOTc3MjQ4MDYyNzk0NWE5NGRjOGZhMjM2NzE1NWQ3NA==";

        $this->assertEquals($authContent, $result);
    }

    public function test_should_generate_subscription_auth_content_with_body_parameters()
    {
        $uri = 'https://api.iyzipay.com/v2/subscription/initialize';
        $apiKey = 'test';
        $secretKey = 'test';
        $randomString = '123456789';
        $request = new Request();

        $iyziAuthV2Generator = new IyziAuthV2Generator();
        $result = $iyziAuthV2Generator->generateAuthContent($uri, $apiKey, $secretKey, $randomString, $request);
        $authContent = "YXBpS2V5OnRlc3QmcmFuZG9tS2V5OjEyMzQ1Njc4OSZzaWduYXR1cmU6MWE5NmZkODEwNDFiZjFiZDg0MDVhOWFmN2I2OGRmMzczNzZiMGM0NDBiNjYzZTQwNzg2MDA4YTI4ZDIzNzk3MQ==";

        $this->assertEquals($authContent, $result);
    }
}