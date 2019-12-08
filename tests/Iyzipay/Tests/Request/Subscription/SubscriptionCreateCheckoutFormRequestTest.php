<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionCreateCheckoutFormRequest;
use Iyzipay\Tests\TestCase;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Customer;

class SubscriptionCreateCheckoutFormRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("http://callbackurl.com", $jsonObject["callbackUrl"]);
        $this->assertEquals("ffed3cb1-1cf6-476f-9a0c-ae2a89e2cc1d", $jsonObject["pricingPlanReferenceCode"]);
        $this->assertEquals("ACTIVE", $jsonObject["subscriptionInitialStatus"]);
        $this->assertEquals("John", $jsonObject["customer"]["name"]);;
        $this->assertEquals("Doe", $jsonObject["customer"]["surname"]);
        $this->assertEquals("+905555555555", $jsonObject["customer"]["gsmNumber"]);
        $this->assertEquals("johndoe@iyzico.com", $jsonObject["customer"]["email"]);
        $this->assertEquals("11111111111", $jsonObject["customer"]["identityNumber"]);
        $this->assertEquals("John Doe", $jsonObject["customer"]["shippingAddress"]["contactName"]);
        $this->assertEquals("Istanbul", $jsonObject["customer"]["shippingAddress"]["city"]);
        $this->assertEquals("Turkey", $jsonObject["customer"]["shippingAddress"]["country"]);
        $this->assertEquals("Uskudar Burhaniye Mahallesi iyzico A.S", $jsonObject["customer"]["shippingAddress"]["address"]);
        $this->assertEquals("34660", $jsonObject["customer"]["shippingAddress"]["zipCode"]);
        $this->assertEquals("John Doe", $jsonObject["customer"]["billingAddress"]["contactName"]);
        $this->assertEquals("Istanbul", $jsonObject["customer"]["billingAddress"]["city"]);
        $this->assertEquals("Turkey", $jsonObject["customer"]["billingAddress"]["country"]);
        $this->assertEquals("Uskudar Burhaniye Mahallesi iyzico A.S", $jsonObject["customer"]["billingAddress"]["address"]);
        $this->assertEquals("34660", $jsonObject["customer"]["billingAddress"]["zipCode"]);

    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '{
                  "callbackUrl": "http://callbackurl.com",
                  "conversationId": "123456789",
                  "customer": {
                    "billingAddress": {
                      "address": "Uskudar Burhaniye Mahallesi iyzico A.S",
                      "city": "Istanbul",
                      "contactName": "John Doe",
                      "country": "Turkey",
                      "zipCode": "34660"
                    },
                    "email": "johndoe@iyzico.com",
                    "gsmNumber": "+905555555555",
                    "identityNumber": "11111111111",
                    "name": "John",
                    "shippingAddress": {
                      "address": "Uskudar Burhaniye Mahallesi iyzico A.S",
                      "city": "Istanbul",
                      "contactName": "John Doe",
                      "country": "Turkey",
                      "zipCode": "34660"
                    },
                    "surname": "Doe"
                  },
                  "locale": "tr",
                  "pricingPlanReferenceCode": "ffed3cb1-1cf6-476f-9a0c-ae2a89e2cc1d",
                  "subscriptionInitialStatus": "ACTIVE"
                }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new SubscriptionCreateCheckoutFormRequest();
        $request->setConversationId("123456789");
        $request->setLocale("tr");
        $request->setPricingPlanReferenceCode("ffed3cb1-1cf6-476f-9a0c-ae2a89e2cc1d");
        $request->setSubscriptionInitialStatus("ACTIVE");
        $request->setCallbackUrl("http://callbackurl.com");
        $customer = new Customer();
        $customer->setName("John");
        $customer->setSurname("Doe");
        $customer->setGsmNumber("+905555555555");
        $customer->setEmail("johndoe@iyzico.com");
        $customer->setIdentityNumber("11111111111");
        $customer->setShippingContactName("John Doe");
        $customer->setShippingCity("Istanbul");
        $customer->setShippingCountry("Turkey");
        $customer->setShippingAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
        $customer->setShippingZipCode("34660");
        $customer->setBillingContactName("John Doe");
        $customer->setBillingCity("Istanbul");
        $customer->setBillingCountry("Turkey");
        $customer->setBillingAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
        $customer->setBillingZipCode("34660");
        $request->setCustomer($customer);
        return $request;
    }
}
