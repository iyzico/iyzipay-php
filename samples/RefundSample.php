<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

$sample = new RefundSample();
$sample->should_refund();
$sample->should_refund_charged_from_merchant();

class RefundSample extends Sample
{
    public function should_refund()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateRefundRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentTransactionId("50");
        $request->setPrice("0.1");
        $request->setIp("127.0.0.1");

        # make request
        $response = Iyzipay\Model\Refund::create($request, parent::options());

        # print response
        print_r($response);
    }

    public function should_refund_charged_from_merchant()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateRefundRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentTransactionId("41");
        $request->setPrice("0.05");
        $request->setIp("127.0.0.1");

        # make request
        $response = Iyzipay\Model\RefundChargedFromMerchant::create($request, parent::options());

        # print response
        print_r($response);
    }
}