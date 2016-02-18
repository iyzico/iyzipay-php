<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

$sample = new CancelSample();
$sample->should_cancel_payment();

class CancelSample extends Sample
{
    public function should_cancel_payment()
    {
        # create request class
        $request = new Iyzipay\Request\CreateCancelRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("1");
        $request->setIp("127.0.0.1");

        # make request
        $cancel = Iyzipay\Model\Cancel::create($request, parent::options());

        # print result
        print_r($cancel);
    }
}
