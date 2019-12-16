<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionCreateRequest;
use Iyzipay\Tests\TestCase;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Customer;

class SubscriptionCreateRequestTest extends TestCase
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
        $this->assertEquals("John Doe", $jsonObject["paymentCard"]["cardHolderName"]);
        $this->assertEquals("4603450000000000", $jsonObject["paymentCard"]["cardNumber"]);
        $this->assertEquals("123", $jsonObject["paymentCard"]["cvc"]);
        $this->assertEquals("12", $jsonObject["paymentCard"]["expireMonth"]);
        $this->assertEquals("2030", $jsonObject["paymentCard"]["expireYear"]);
        $this->assertEquals(true, $jsonObject["paymentCard"]["registerConsumerCard"]);
    }

    public function test_should_convert_card_to_pki_request_string()
    {

        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName("John Doe");
        $paymentCard->setCardNumber("1111110000000000");
        $paymentCard->setExpireMonth("12");
        $paymentCard->setExpireYear("2030");
        $paymentCard->setCvc("123");
        $paymentCard->setRegisterConsumerCard(true);
        $paymentCard->setRegisterCard(1);
        $paymentCard->setCardAlias("john");
        $paymentCard->setCardToken("cardtoken");
        $paymentCard->setCardUserKey("key");
        $paymentCard->setUcsToken("ucstoken");
        $paymentCard->setConsumerToken("consumertoken");


        $str = "[cardHolderName=John Doe,cardNumber=1111110000000000,expireYear=2030,expireMonth=12,cvc=123,registerCard=1,cardAlias=john,cardToken=cardtoken,cardUserKey=key,registerConsumerCard=1,consumerToken=consumertoken,ucsToken=ucstoken]";
        $this->assertEquals($str, $paymentCard->toPKIRequestString());
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
                    "cardHolderName": "John Doe",
                    "cardNumber": "4603450000000000",
                    "cvc": "123",
                    "expireMonth": "12",
                    "expireYear": "2030",
                    "registerConsumerCard": true
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
        $paymentCard->setCardHolderName("John Doe");
        $paymentCard->setCardNumber("4603450000000000");
        $paymentCard->setExpireMonth("12");
        $paymentCard->setExpireYear("2030");
        $paymentCard->setCvc("123");
        $paymentCard->setRegisterConsumerCard(true);
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
