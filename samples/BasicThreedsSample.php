<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new BasicThreedsSample();
$sample->should_initialize_threeds_with_card();
$sample->should_initialize_threeds_with_card_token();
$sample->should_auth_threeds();

class BasicThreedsSample
{
    public function should_initialize_threeds_with_card()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateBasicPaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setBuyerEmail("email@email.com");
        $request->setBuyerId("B2323");
        $request->setBuyerIp("85.34.78.112");
        $request->setConnectorName("connector name");
        $request->setInstallment(1);
        $request->setPrice("1");
        $request->setPaidPrice("1");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setCallbackUrl("https://www.merchant.com/callback");

        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName("John Doe");
        $paymentCard->setCardNumber("5528790000000008");
        $paymentCard->setExpireMonth("12");
        $paymentCard->setExpireYear("2030");
        $paymentCard->setCvc("123");
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        # make request
        $basicThreedsInitialize = \Iyzipay\Model\BasicThreedsInitialize::create($request, Sample::options());

        # print result
        print_r($basicThreedsInitialize);
    }

    public function should_initialize_threeds_with_card_token()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateBasicPaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setBuyerEmail("email@email.com");
        $request->setBuyerId("B2323");
        $request->setBuyerIp("85.34.78.112");
        $request->setConnectorName("connector name");
        $request->setInstallment(1);
        $request->setPrice("1");
        $request->setPaidPrice("1");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setCallbackUrl("https://www.merchant.com/callback");

        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardToken("card token");
        $paymentCard->setCardUserKey("card user key");
        $request->setPaymentCard($paymentCard);

        # make request
        $basicThreedsInitialize = \Iyzipay\Model\BasicThreedsInitialize::create($request, Sample::options());

        # print result
        print_r($basicThreedsInitialize);
    }

    public function should_auth_threeds()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateThreedsPaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("1");

        # make request
        $basicThreedsPayment = \Iyzipay\Model\BasicThreedsPayment::create($request, Sample::options());

        # print result
        print_r($basicThreedsPayment);
    }
}