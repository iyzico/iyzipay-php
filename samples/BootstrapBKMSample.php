<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();
class BootstrapBKMSample {
    public function run() {
        $this->should_initialize_bkm_express();
        $this->should_retrieve_bkm_auth();
    }

    public function should_initialize_bkm_express() {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\CreateBKMInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setBasketId("B67832");
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setBuyer($this->newBuyer());
        $request->setShippingAddress($this->newShippingAddress());
        $request->setBillingAddress($this->newBillingAddress());
        $request->setBasketItems($this->newBasketItems());
        $request->setCallbackUrl("https://www.merchant.com/callbackUrl");

        # make request
        $response = \Iyzipay\Model\BKMInitialize::create($request, $options);

        # print response
        print_r($response);
    }

    public function should_retrieve_bkm_auth() {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\RetrieveBKMAuthRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setToken("mockToken1453382198111");

        $result = Iyzipay\Model\BKMAuth::retrieve($request, $options);

        print_r($result);
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