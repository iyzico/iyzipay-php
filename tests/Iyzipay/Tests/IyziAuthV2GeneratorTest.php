<?php

namespace Iyzipay\Tests;

use Iyzipay\HashGenerator;
use Iyzipay\IyziAuthV2Generator;
use Iyzipay\Model\Locale;
use Iyzipay\Request;

class IyziAuthV2GeneratorTest extends TestCase
{
    public function test_should_generate_auth_content()
    {
        $uri = 'https://api.iyzipay.com/Iyzilink/v2/Iyzilink/products/';
        $apiKey = 'test';
        $secretKey = 'test';
        $randomString = '123456789';
        $authContent = "YXBpS2V5OnRlc3QmcmFuZG9tS2V5OjEyMzQ1Njc4OSZzaWduYXR1cmU6Y2Y0Mjk5ZTQwYzZkZThmMzYzZGQyMWZiN2QzNjI3MjE2YTUxNjM2MDY1YTViOTM0YTMxODJiNTk0YjQ2ZjVhMA==";
        $request = new Request();

        $iyziAuthV2Generator = new IyziAuthV2Generator();
        $result = $iyziAuthV2Generator->generateAuthContent($uri, $apiKey, $secretKey, $randomString, $request);

        $this->assertEquals($authContent, $result);
    }
}