<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new CheckoutFormSample();
$sample->should_initialize_checkout_form();
$sample->should_retrieve_checkout_form_auth();

class CheckoutFormSample
{
    public function should_initialize_checkout_form()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1.0");
        $request->setPaidPrice("1.2");
        $request->setBasketId("B67832");
        $request->setPaymentGroup(Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setBuyer($this->newBuyer());
        $request->setShippingAddress($this->newShippingAddress());
        $request->setBillingAddress($this->newBillingAddress());
        $request->setBasketItems($this->newBasketItems());
        $request->setCallbackUrl("https://www.merchant.com/callback");

        # make request
        $checkoutFormInitialize = Iyzipay\Model\CheckoutFormInitialize::create($request, Sample::options());

        # print result
        print_r($checkoutFormInitialize);
    }

    public function should_retrieve_checkout_form_auth()
    {
        # create request class
        $request = new \Iyzipay\Request\RetrieveCheckoutFormAuthRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setToken("myToken");

        # make request
        $checkoutFormAuth = Iyzipay\Model\CheckoutFormAuth::retrieve($request, Sample::options());

        # print result
        print_r($checkoutFormAuth);
    }

    private function newBuyer()
    {
        $buyer = new Iyzipay\Model\Buyer();
        $buyer->setId("100");
        $buyer->setName("Hakan");
        $buyer->setSurname("Erdoğan");
        $buyer->setIdentityNumber("16045258606");
        $buyer->setEmail("email@email.com");
        $buyer->setGsmNumber("05553456789");
        $buyer->setRegistrationDate("2011-02-17 12:00:00");
        $buyer->setLastLoginDate("2015-04-20 12:00:00");
        $buyer->setRegistrationAddress("Maltepe");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkiye");
        $buyer->setZipCode("34840");
        $buyer->setIp("192.168.123.102");
        return $buyer;
    }

    private function newShippingAddress()
    {
        $address = new \Iyzipay\Model\Address();
        $address->setAddress("Malte Plaza No:56");
        $address->setZipCode("34840");
        $address->setContactName("Hakan");
        $address->setCity("Istanbul");
        $address->setCountry("Turkiye");
        return $address;
    }

    private function newBillingAddress()
    {
        $address = new \Iyzipay\Model\Address();
        $address->setAddress("Malte Plaza No:56");
        $address->setZipCode("34840");
        $address->setContactName("Hakan");
        $address->setCity("Istanbul");
        $address->setCountry("Turkiye");
        return $address;
    }

    private function newBasketItems()
    {
        $basketItems = array();
        $firstBasketItem = new Iyzipay\Model\BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("ABC Marka Kolye");
        $firstBasketItem->setCategory1("Giyim");
        $firstBasketItem->setCategory2("Aksesuar");
        $firstBasketItem->setItemType(Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("0.3");
        $firstBasketItem->setSubMerchantKey("subMerchantKey");
        $firstBasketItem->setSubMerchantPrice("0.27");

        $secondBasketItem = new Iyzipay\Model\BasketItem();
        $secondBasketItem->setId("BI102");
        $secondBasketItem->setName("XYZ Oyun Kodu");
        $secondBasketItem->setCategory1("Oyun");
        $secondBasketItem->setCategory2("Online Oyun Kodlari");
        $secondBasketItem->setItemType(Iyzipay\Model\BasketItemType::VIRTUAL);
        $secondBasketItem->setPrice("0.5");
        $secondBasketItem->setSubMerchantKey("subMerchantKey");
        $secondBasketItem->setSubMerchantPrice("0.42");

        $thirdBasketItem = new Iyzipay\Model\BasketItem();
        $thirdBasketItem->setId("BI103");
        $thirdBasketItem->setName("EDC Marka Usb");
        $thirdBasketItem->setCategory1("Elektronik");
        $thirdBasketItem->setCategory2("Usb / Cable");
        $thirdBasketItem->setItemType(Iyzipay\Model\BasketItemType::PHYSICAL);
        $thirdBasketItem->setPrice("0.2");
        $thirdBasketItem->setSubMerchantKey("subMerchantKey");
        $thirdBasketItem->setSubMerchantPrice("0.18");

        $basketItems[0] = $firstBasketItem;
        $basketItems[1] = $secondBasketItem;
        $basketItems[2] = $thirdBasketItem;

        return $basketItems;
    }
}