<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new RefundSample();
$sample->should_refund();
$sample->should_refund_charged_from_merchant();

class RefundSample
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
        $refund = \Iyzipay\Model\Refund::create($request, Sample::options());

        # print result
        print_r($refund);
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
        $refundChargedFromMerchant = \Iyzipay\Model\RefundChargedFromMerchant::create($request, Sample::options());

        # print result
        print_r($refundChargedFromMerchant);
    }
}