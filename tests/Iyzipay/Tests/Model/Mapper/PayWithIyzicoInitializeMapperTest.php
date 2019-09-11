<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\PayWithIyzicoInitialize;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\PayWithIyzicoInitializeMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class PayWithIyzicoInitializeMapperTest extends TestCase
{
    public function test_should_map_pay_with_iyzico_initialize()
    {
        $json = $this->retrieveJsonFile("initialize-pay-with-iyzico.json");

        $payWithIyzicoInitialize = PayWithIyzicoInitializeMapper::create($json)->jsonDecode()->mapPayWithIyzicoInitialize(new PayWithIyzicoInitialize());

        $this->assertNotEmpty($payWithIyzicoInitialize);
        $this->assertEquals(Status::FAILURE, $payWithIyzicoInitialize->getStatus());
        $this->assertEquals("10000", $payWithIyzicoInitialize->getErrorCode());
        $this->assertEquals("error message", $payWithIyzicoInitialize->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $payWithIyzicoInitialize->getErrorGroup());
        $this->assertEquals(Locale::TR, $payWithIyzicoInitialize->getLocale());
        $this->assertEquals("1458545234852", $payWithIyzicoInitialize->getSystemTime());
        $this->assertEquals("123456", $payWithIyzicoInitialize->getConversationId());
        $this->assertEquals("token", $payWithIyzicoInitialize->getToken());
        $this->assertEquals("payWithIyzicoContent", $payWithIyzicoInitialize->getPayWithIyzicoContent());
        $this->assertEquals("3600", $payWithIyzicoInitialize->getTokenExpireTime());
        $this->assertEquals("url", $payWithIyzicoInitialize->getPayWithIyzicoPageUrl());
        $this->assertJson($payWithIyzicoInitialize->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $payWithIyzicoInitialize->getRawResult());
    }
}