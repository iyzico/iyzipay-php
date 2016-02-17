<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

$sample = new ConnectRefundSample();
$sample->should_refund_payment();

class ConnectRefundSample extends Sample
{
    public function should_refund_payment()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateRefundRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentTransactionId("29");
        $request->setPrice("1.0");
        $request->setIp("127.0.0.1");

        # make request
        $response = Iyzipay\Model\ConnectRefund::create($request, parent::options());

        # print response
        print_r($response);
    }
}
