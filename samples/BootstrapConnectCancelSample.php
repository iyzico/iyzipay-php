<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

$sample = new ConnectCancelSample();
$sample->should_cancel_payment();

class ConnectCancelSample extends Sample
{
    public function should_cancel_payment()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateCancelRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("24");
        $request->setIp("127.0.0.1");

        # make request
        $response = Iyzipay\Model\ConnectCancel::create($request, parent::options());

        # print response
        print_r($response);
    }
}
