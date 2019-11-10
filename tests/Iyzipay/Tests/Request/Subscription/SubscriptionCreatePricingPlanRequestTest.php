<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionCreatePricingPlanRequest;
use Iyzipay\Tests\TestCase;
use Iyzipay\Model\Locale;

class SubscriptionCreatePricingPlanRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("TRY", $jsonObject["currencyCode"]);
        $this->assertEquals("NameOfPricingPlan", $jsonObject["name"]);
        $this->assertEquals("WEEKLY", $jsonObject["paymentInterval"]);
        $this->assertEquals("1", $jsonObject["paymentIntervalCount"]);
        $this->assertEquals("RECURRING", $jsonObject["planPaymentType"]);
        $this->assertEquals("30.0", $jsonObject["price"]);
        $this->assertEquals("ac188383-d30e-490e-94bb-239ff6af4b5b", $jsonObject["productReferenceCode"]);
        $this->assertEquals("5", $jsonObject["recurrenceCount"]);
        $this->assertEquals("30", $jsonObject["trialPeriodDays"]);
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '{
                      "conversationId": "123456789",
                      "currencyCode": "TRY",
                      "locale": "tr",
                      "name": "NameOfPricingPlan",
                      "paymentInterval": "WEEKLY",
                      "paymentIntervalCount": 1,
                      "planPaymentType": "RECURRING",
                      "price": "30.0",
                      "productReferenceCode": "ac188383-d30e-490e-94bb-239ff6af4b5b",
                      "recurrenceCount": 5,
                      "trialPeriodDays": 30
                }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new SubscriptionCreatePricingPlanRequest();
        $request->setLocale('tr');
        $request->setConversationId('123456789');
        $request->setProductReferenceCode('ac188383-d30e-490e-94bb-239ff6af4b5b');
        $request->setName('NameOfPricingPlan');
        $request->setPrice('30.0');
        $request->setCurrencyCode('TRY');
        $request->setPaymentInterval('WEEKLY');
        $request->setPaymentIntervalCount(1);
        $request->setTrialPeriodDays(30);
        $request->setRecurrenceCount(5);
        $request->setPlanPaymentType('RECURRING');;
        return $request;
    }
}
