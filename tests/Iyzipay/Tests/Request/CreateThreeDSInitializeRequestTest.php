<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Locale;
use Iyzipay\Request\CreateThreeDSInitializeRequest;
use Iyzipay\Tests\TestCase;

class CreateThreeDSInitializeRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = new CreateThreeDSInitializeRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setPaidPrice("1.1");
        $request->setInstallment(1);
        $request->setBasketId("B67832");
        $request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl("https://www.merchant.com/callback");

        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName("John Doe");
        $paymentCard->setCardNumber("5528790000000008");
        $paymentCard->setExpireMonth("12");
        $paymentCard->setExpireYear("2030");
        $paymentCard->setCvc("123");
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId("BY789");
        $buyer->setName("John");
        $buyer->setSurname("Doe");
        $buyer->setGsmNumber("+905350000000");
        $buyer->setEmail("email@email.com");
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Jane Doe");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Jane Doe");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("Binocular");
        $firstBasketItem->setCategory1("Collectibles");
        $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("0.3");
        $basketItems[0] = $firstBasketItem;
        $request->setBasketItems($basketItems);
        
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("1", $jsonObject["price"]);
        $this->assertEquals("1.1", $jsonObject["paidPrice"]);
        $this->assertEquals("1", $jsonObject["installment"]);
        $this->assertEquals(\Iyzipay\Model\PaymentChannel::WEB, $jsonObject["paymentChannel"]);
        $this->assertEquals(\Iyzipay\Model\PaymentGroup::PRODUCT, $jsonObject["paymentGroup"]);
        $this->assertEquals("https://www.merchant.com/callback", $jsonObject["callbackUrl"]);
        $this->assertEquals("John Doe", $jsonObject["paymentCard"]["cardHolderName"]);
        $this->assertEquals("5528790000000008", $jsonObject["paymentCard"]["cardNumber"]);
        $this->assertEquals("12", $jsonObject["paymentCard"]["expireMonth"]);
        $this->assertEquals("2030", $jsonObject["paymentCard"]["expireYear"]);
        $this->assertEquals("123", $jsonObject["paymentCard"]["cvc"]);
        $this->assertEquals("BY789", $jsonObject["buyer"]["id"]);
        $this->assertEquals("John", $jsonObject["buyer"]["name"]);
        $this->assertEquals("Doe", $jsonObject["buyer"]["surname"]);
        $this->assertEquals("+905350000000", $jsonObject["buyer"]["gsmNumber"]);
        $this->assertEquals("email@email.com", $jsonObject["buyer"]["email"]);
        $this->assertEquals("74300864791", $jsonObject["buyer"]["identityNumber"]);
        $this->assertEquals("2015-10-05 12:43:35", $jsonObject["buyer"]["lastLoginDate"]);
        $this->assertEquals("2013-04-21 15:12:09", $jsonObject["buyer"]["registrationDate"]);
        $this->assertEquals("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1", $jsonObject["buyer"]["registrationAddress"]);
        $this->assertEquals("85.34.78.112", $jsonObject["buyer"]["ip"]);
        $this->assertEquals("Istanbul", $jsonObject["buyer"]["city"]);
        $this->assertEquals("Turkey", $jsonObject["buyer"]["country"]);
        $this->assertEquals("34732", $jsonObject["buyer"]["zipCode"]);
        $this->assertEquals("Jane Doe", $jsonObject["shippingAddress"]["contactName"]);
        $this->assertEquals("Istanbul", $jsonObject["shippingAddress"]["city"]);
        $this->assertEquals("Turkey", $jsonObject["shippingAddress"]["country"]);
        $this->assertEquals("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1", $jsonObject["shippingAddress"]["address"]);
        $this->assertEquals("34742", $jsonObject["shippingAddress"]["zipCode"]);
        $this->assertEquals("Jane Doe", $jsonObject["billingAddress"]["contactName"]);
        $this->assertEquals("Istanbul", $jsonObject["billingAddress"]["city"]);
        $this->assertEquals("Turkey", $jsonObject["billingAddress"]["country"]);
        $this->assertEquals("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1", $jsonObject["billingAddress"]["address"]);
        $this->assertEquals("34742", $jsonObject["billingAddress"]["zipCode"]);
        $this->assertEquals("BI101", $jsonObject["basketItems"][0]["id"]);
        $this->assertEquals("Binocular", $jsonObject["basketItems"][0]["name"]);
        $this->assertEquals("Collectibles", $jsonObject["basketItems"][0]["category1"]);
        $this->assertEquals("Accessories", $jsonObject["basketItems"][0]["category2"]);
        $this->assertEquals(\Iyzipay\Model\BasketItemType::PHYSICAL, $jsonObject["basketItems"][0]["itemType"]);
        $this->assertEquals("0.3", $jsonObject["basketItems"][0]["price"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = new CreateThreeDSInitializeRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setPaidPrice("1.1");
        $request->setInstallment(1);
        $request->setBasketId("B67832");
        $request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl("https://www.merchant.com/callback");

        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName("John Doe");
        $paymentCard->setCardNumber("5528790000000008");
        $paymentCard->setExpireMonth("12");
        $paymentCard->setExpireYear("2030");
        $paymentCard->setCvc("123");
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId("BY789");
        $buyer->setName("John");
        $buyer->setSurname("Doe");
        $buyer->setGsmNumber("+905350000000");
        $buyer->setEmail("email@email.com");
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Jane Doe");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Jane Doe");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("Binocular");
        $firstBasketItem->setCategory1("Collectibles");
        $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("0.3");
        $basketItems[0] = $firstBasketItem;
        $request->setBasketItems($basketItems);

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "price=1.0," .
            "paidPrice=1.1," .
            "installment=1," .
            "paymentChannel=WEB," .
            "basketId=B67832," .
            "paymentGroup=PRODUCT," .
            "paymentCard=[cardHolderName=John Doe," .
                "cardNumber=5528790000000008," .
                "expireYear=2030," .
                "expireMonth=12," .
                "cvc=123," .
                "registerCard=0]," .
            "buyer=[id=BY789," .
                "name=John," .
                "surname=Doe," .
                "identityNumber=74300864791," .
                "email=email@email.com," .
                "gsmNumber=+905350000000," .
                "registrationDate=2013-04-21 15:12:09," .
                "lastLoginDate=2015-10-05 12:43:35," .
                "registrationAddress=Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1," .
                "city=Istanbul," .
                "country=Turkey," .
                "zipCode=34732," .
                "ip=85.34.78.112]," .
            "shippingAddress=[address=Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1,".
                "zipCode=34742," .
                "contactName=Jane Doe," .
                "city=Istanbul," .
                "country=Turkey]," .
            "billingAddress=[address=Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1,".
                "zipCode=34742," .
                "contactName=Jane Doe," .
                "city=Istanbul," .
                "country=Turkey]," .
            "basketItems=[[id=BI101," .
                "price=0.3," .
                "name=Binocular," .
                "category1=Collectibles," .
                "category2=Accessories," .
                "itemType=PHYSICAL]]," .
                "callbackUrl=https://www.merchant.com/callback]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = new CreateThreeDSInitializeRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setPaidPrice("1.1");
        $request->setInstallment(1);
        $request->setBasketId("B67832");
        $request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl("https://www.merchant.com/callback");

        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName("John Doe");
        $paymentCard->setCardNumber("5528790000000008");
        $paymentCard->setExpireMonth("12");
        $paymentCard->setExpireYear("2030");
        $paymentCard->setCvc("123");
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId("BY789");
        $buyer->setName("John");
        $buyer->setSurname("Doe");
        $buyer->setGsmNumber("+905350000000");
        $buyer->setEmail("email@email.com");
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Jane Doe");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Jane Doe");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("Binocular");
        $firstBasketItem->setCategory1("Collectibles");
        $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("0.3");
        $basketItems[0] = $firstBasketItem;
        $request->setBasketItems($basketItems);

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "price":"1.0",
                "paidPrice":"1.1",
                "installment":1,
                "paymentChannel":"WEB",
                "basketId":"B67832",
                "paymentGroup":"PRODUCT",
                "paymentCard":
                {
                    "cardHolderName":"John Doe",
                    "cardNumber":"5528790000000008",
                    "expireYear":"2030",
                    "expireMonth":"12",
                    "cvc":"123",
                    "registerCard":0
                },
                "buyer":
                {
                    "id":"BY789",
                    "name":"John",
                    "surname":"Doe",
                    "identityNumber":"74300864791",
                    "email":"email@email.com",
                    "gsmNumber":"+905350000000",
                    "registrationDate":"2013-04-21 15:12:09",
                    "lastLoginDate":"2015-10-05 12:43:35",
                    "registrationAddress":"Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1",
                    "city":"Istanbul",
                    "country":"Turkey",
                    "zipCode":"34732",
                    "ip":"85.34.78.112"
                },
                "shippingAddress":
                {
                    "address":"Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1",
                    "zipCode":"34742",
                    "contactName":"Jane Doe",
                    "city":"Istanbul",
                    "country":"Turkey"
                },
                "billingAddress":
                {
                    "address":"Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1",
                    "zipCode":"34742",
                    "contactName":"Jane Doe",
                    "city":"Istanbul",
                    "country":"Turkey"
                },
                "basketItems":
                [
                    {
                        "id":"BI101",
                        "price":"0.3",
                        "name":"Binocular",
                        "category1":"Collectibles",
                        "category2":"Accessories",
                        "itemType":"PHYSICAL"
                    }
                ],
                "callbackUrl":"https://www.merchant.com/callback"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }
}
