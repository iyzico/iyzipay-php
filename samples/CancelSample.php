<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new CancelSample();
$sample->should_cancel_payment();

class CancelSample
{
    public function should_cancel_payment()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateCancelRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("1");
        $request->setIp("85.34.78.112");

        # make request
        $cancel = \Iyzipay\Model\Cancel::create($request, Sample::options());

        # print result
        print_r($cancel);
    }
}