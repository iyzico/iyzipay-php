<?php

namespace Iyzipay\Tests;

use Iyzipay\HashGenerator;
use Iyzipay\IyziAuthV2Generator;
use Iyzipay\Model\Locale;
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

        $authContent = "YXBpS2V5OnRlc3QmcmFuZG9tS2V5OjEyMzQ1Njc4OSZzaWduYXR1cmU6Y2Y0Mjk5ZTQwYzZkZThmMzYzZGQyMWZiN2QzNjI3MjE2YTUxNjM2MDY1YTViOTM0YTMxODJiNTk0YjQ2ZjVhMA==";
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
        $authContent = "YXBpS2V5OnRlc3QmcmFuZG9tS2V5OjEyMzQ1Njc4OSZzaWduYXR1cmU6Nzg3NjFjMmJhZDQ0ZmE2MWI5NDNhZDIyYmM4NmJjNThjM2ZhMWQ3NDgwMDFjMTEzNTdlY2EzZjkwNGM0NGQxYg==";

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
        $authContent = "YXBpS2V5OnRlc3QmcmFuZG9tS2V5OjEyMzQ1Njc4OSZzaWduYXR1cmU6Y2Y0Mjk5ZTQwYzZkZThmMzYzZGQyMWZiN2QzNjI3MjE2YTUxNjM2MDY1YTViOTM0YTMxODJiNTk0YjQ2ZjVhMA==";

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
        $authContent = "YXBpS2V5OnRlc3QmcmFuZG9tS2V5OjEyMzQ1Njc4OSZzaWduYXR1cmU6NmYzODQwOTlhYWUzMjhmNzJkYWY5Y2RhYjEwNWViMzdmYjI5NjIwMjUxYzQ3YjRjNTgzZDc0OGQ5ZDBhYjc2NA==";

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
        $authContent = "YXBpS2V5OnRlc3QmcmFuZG9tS2V5OjEyMzQ1Njc4OSZzaWduYXR1cmU6YmM0NGIyZjRkZmI4ZGY3NDE0N2IxZjUyN2ZmNjM2NDQ0YzNiM2QzYTFmZjk3ZGNiMzM2NmJjMjkzZmFjZjI5OA==";

        $this->assertEquals($authContent, $result);
    }
}