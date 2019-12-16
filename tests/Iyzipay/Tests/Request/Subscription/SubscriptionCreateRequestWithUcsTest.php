<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionCreateRequest;
use Iyzipay\Tests\TestCase;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Customer;

class SubscriptionCreateRequestWithUcsTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("c1d489b6-9adc-42fa-88ae-47ea2e5dbe1e", $jsonObject["pricingPlanReferenceCode"]);
        $this->assertEquals("ACTIVE", $jsonObject["subscriptionInitialStatus"]);
        $this->assertEquals("johndoe@iyzico.com", $jsonObject["customer"]["email"]);
        $this->assertEquals("+905555555555", $jsonObject["customer"]["gsmNumber"]);
        $this->assertEquals("11111111111", $jsonObject["customer"]["identityNumber"]);
        $this->assertEquals("John", $jsonObject["customer"]["name"]);
        $this->assertEquals("Doe", $jsonObject["customer"]["surname"]);
        $this->assertEquals("Uskudar Burhaniye Mahallesi iyzico A.S", $jsonObject["customer"]["billingAddress"]["address"]);
        $this->assertEquals("Istanbul", $jsonObject["customer"]["billingAddress"]["city"]);
        $this->assertEquals("John Doe", $jsonObject["customer"]["billingAddress"]["contactName"]);
        $this->assertEquals("Turkey", $jsonObject["customer"]["billingAddress"]["country"]);
        $this->assertEquals("34660", $jsonObject["customer"]["billingAddress"]["zipCode"]);
        $this->assertEquals("Uskudar Burhaniye Mahallesi iyzico A.S", $jsonObject["customer"]["shippingAddress"]["address"]);
        $this->assertEquals("Istanbul", $jsonObject["customer"]["shippingAddress"]["city"]);
        $this->assertEquals("John Doe", $jsonObject["customer"]["shippingAddress"]["contactName"]);
        $this->assertEquals("Turkey", $jsonObject["customer"]["shippingAddress"]["country"]);
        $this->assertEquals("34660", $jsonObject["customer"]["shippingAddress"]["zipCode"]);
        $this->assertEquals("211f19ab-82bf-486e-b296-512bbdf214a1", $jsonObject["paymentCard"]["cardToken"]);
        $this->assertEquals("11111", $jsonObject["paymentCard"]["consumerToken"]);
        $this->assertEquals("cce7a356-8679-4de7-b7ba-d5872b5ce76b", $jsonObject["paymentCard"]["ucsToken"]);
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '{
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
                  "paymentCard": {
                    "cardToken": "211f19ab-82bf-486e-b296-512bbdf214a1",
                    "consumerToken": "11111",
                    "ucsToken": "cce7a356-8679-4de7-b7ba-d5872b5ce76b"
                  },
                  "pricingPlanReferenceCode": "c1d489b6-9adc-42fa-88ae-47ea2e5dbe1e",
                  "subscriptionInitialStatus": "ACTIVE"
                }';
        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new SubscriptionCreateRequest();
        $request->setLocale("tr");
        $request->setConversationId("123456789");
        $request->setPricingPlanReferenceCode("c1d489b6-9adc-42fa-88ae-47ea2e5dbe1e");
        $request->setSubscriptionInitialStatus("ACTIVE");
        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardToken("211f19ab-82bf-486e-b296-512bbdf214a1");
        $paymentCard->setConsumerToken("11111");
        $paymentCard->setUcsToken("cce7a356-8679-4de7-b7ba-d5872b5ce76b");
        $request->setPaymentCard($paymentCard);
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
