<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new BasicPaymentPreAuthSample();
$sample->should_pay_with_card();
$sample->should_pay_with_card_token();

class BasicPaymentPreAuthSample
{
    public function should_pay_with_card()
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
        $request->setPaidPrice("1");
        $request->setPrice("1");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName("John Doe");
        $paymentCard->setCardNumber("5528790000000008");
        $paymentCard->setExpireMonth("12");
        $paymentCard->setExpireYear("2030");
        $paymentCard->setCvc("123");
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        # make request
        $basicPaymentPreAuth = \Iyzipay\Model\BasicPaymentPreAuth::create($request, Sample::options());

        # print result
        print_r($basicPaymentPreAuth);
    }

    public function should_pay_with_card_token()
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
        $request->setPaidPrice("1");
        $request->setPrice("1");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardToken("card token");
        $paymentCard->setCardUserKey("card user key");
        $request->setPaymentCard($paymentCard);

        # make request
        $basicPaymentPreAuth = \Iyzipay\Model\BasicPaymentPreAuth::create($request, Sample::options());

        # print result
        print_r($basicPaymentPreAuth);
    }
}