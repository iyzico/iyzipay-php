<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

$sample = new ThreeDSSample();
$sample->should_create_market_place_physical_and_virtual_product_with_three_ds_payment();
$sample->should_create_physical_and_virtual_listing_or_subscription_with_threeds_payment();
$sample->should_auth_threeds();

class ThreeDSSample extends Sample
{
    public function should_create_market_place_physical_and_virtual_product_with_three_ds_payment()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateThreeDSInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setCallbackUrl("http://localhost:8080/callbackUrl");
        $request->setPrice("1");
        $request->setPaidPrice("1.1");
        $request->setInstallment(1);
        $request->setBasketId("B67832");
        $request->setPaymentChannel(Iyzipay\Model\PaymentChannel::WEB);
        $request->setPaymentGroup(Iyzipay\Model\PaymentGroup::PRODUCT);

        $paymentCard = new Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName("John Doe");
        $paymentCard->setCardNumber("5528790000000008");
        $paymentCard->setExpireMonth("12");
        $paymentCard->setExpireYear("2030");
        $paymentCard->setCvc("123");
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        $buyer = new Iyzipay\Model\Buyer();
        $buyer->setId("BY789");
        $buyer->setName("Sabri Onur");
        $buyer->setSurname("Tüzün");
        $buyer->setGsmNumber("+905350000000");
        $buyer->setEmail("email@email.com");
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("Nidakule Göztepe İş Merkezi Merdivenköy Mah. Bora Sok. No:1 Kat:19 Bağımsız 70/73 Göztepe Kadıköy");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("İstanbul");
        $buyer->setCountry("Türkiye");
        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Hakan Erdoğan");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkiye");
        $shippingAddress->setAddress("19 Mayıs Mah. İnönü Cad. No:45 Kozyatağı");
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Hakan Erdoğan");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkiye");
        $billingAddress->setAddress("19 Mayıs Mah. İnönü Cad. No:45 Kozyatağı");
        $billingAddress->setZipCode("34742");
        $request->setbillingAddress($billingAddress);

        $basketItems[] = null;
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
        $request->setBasketItems($basketItems);

        # make request
        $response = Iyzipay\Model\ThreeDSInitialize::create($request, parent::options());

        # print response
        print_r($response);
    }

    public function should_create_physical_and_virtual_listing_or_subscription_with_threeds_payment()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateThreeDSInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setCallbackUrl("http://localhost:8080/callbackUrl");
        $request->setPrice("1");
        $request->setPaidPrice("1.1");
        $request->setInstallment(3);
        $request->setBasketId("B67832");
        $request->setPaymentChannel(Iyzipay\Model\PaymentChannel::WEB);
        $request->setPaymentGroup(Iyzipay\Model\PaymentGroup::LISTING);

        $paymentCard = new Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName("John Doe");
        $paymentCard->setCardNumber("5528790000000008");
        $paymentCard->setExpireMonth("12");
        $paymentCard->setExpireYear("2030");
        $paymentCard->setCvc("123");
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        $buyer = new Iyzipay\Model\Buyer();
        $buyer->setId("BY789");
        $buyer->setName("Sabri Onur");
        $buyer->setSurname("Tüzün");
        $buyer->setGsmNumber("+905350000000");
        $buyer->setEmail("email@email.com");
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("Nidakule Göztepe İş Merkezi Merdivenköy Mah. Bora Sok. No:1 Kat:19 Bağımsız 70/73 Göztepe Kadıköy");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("İstanbul");
        $buyer->setCountry("Türkiye");
        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Hakan Erdoğan");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkiye");
        $shippingAddress->setAddress("19 Mayıs Mah. İnönü Cad. No:45 Kozyatağı");
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Hakan Erdoğan");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkiye");
        $billingAddress->setAddress("19 Mayıs Mah. İnönü Cad. No:45 Kozyatağı");
        $billingAddress->setZipCode("34742");
        $request->setbillingAddress($billingAddress);

        $basketItems[] = null;
        $firstBasketItem = new Iyzipay\Model\BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("Dükkan listelemesi ve katalog");
        $firstBasketItem->setCategory1("Listeleme");
        $firstBasketItem->setCategory2("Dükkan");
        $firstBasketItem->setItemType(Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("0.3");

        $secondBasketItem = new Iyzipay\Model\BasketItem();
        $secondBasketItem->setId("BI102");
        $secondBasketItem->setName("Listeleme hizmeti");
        $secondBasketItem->setCategory1("Listeleme");
        $secondBasketItem->setCategory2("Listeleme");
        $secondBasketItem->setItemType(Iyzipay\Model\BasketItemType::VIRTUAL);
        $secondBasketItem->setPrice("0.5");

        $thirdBasketItem = new Iyzipay\Model\BasketItem();
        $thirdBasketItem->setId("BI103");
        $thirdBasketItem->setName("Servis hizmeti");
        $thirdBasketItem->setCategory1("Listeleme");
        $thirdBasketItem->setCategory2("Servis");
        $thirdBasketItem->setItemType(Iyzipay\Model\BasketItemType::VIRTUAL);
        $thirdBasketItem->setPrice("0.2");

        $basketItems[0] = $firstBasketItem;
        $basketItems[1] = $secondBasketItem;
        $basketItems[2] = $thirdBasketItem;
        $request->setBasketItems($basketItems);

        # make request
        $response = Iyzipay\Model\ThreeDSInitialize::create($request, parent::options());

        # print response
        print_r($response);
    }

    public function should_auth_threeds()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateThreeDSAuthRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("12345");
        $request->setConversationData("conversation data");

        # make request
        $response = Iyzipay\Model\ThreeDSAuth::create($request, parent::options());

        # print response
        print_r($response);
    }
}