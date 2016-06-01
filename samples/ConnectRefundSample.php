<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new ConnectRefundSample();
$sample->should_refund_payment();

class ConnectRefundSample
{
    public function should_refund_payment()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateRefundRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentTransactionId("1");
        $request->setPrice("1");
        $request->setIp("85.34.78.112");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        # make request
        $connectRefund = \Iyzipay\Model\ConnectRefund::create($request, Sample::options());

        # print result
        print_r($connectRefund);
    }
}
