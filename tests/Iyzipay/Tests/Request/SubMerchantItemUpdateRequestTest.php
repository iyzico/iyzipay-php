<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\SubMerchantPaymentItemUpdateRequest;
use Iyzipay\Tests\TestCase;

class SubMerchantItemUpdateRequestTest extends TestCase
{
    public function test_should_submerchant_payment_item_request_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("123456789", $jsonObject["paymentTransactionId"]);
        $this->assertEquals("test", $jsonObject["subMerchantKey"]);
        $this->assertEquals(0.1, $jsonObject["subMerchantPrice"]);
    }

    private function prepareRequest()
    {
        $request = new SubMerchantPaymentItemUpdateRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentTransactionId("123456789");
        $request->setSubMerchantKey("test");
        $request->setSubMerchantPrice(0.1);

        return $request;
    }
}