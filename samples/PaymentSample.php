<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new PaymentSample();
$sample->should_retrieve_payment();

class PaymentSample
{
    public function should_retrieve_payment()
    {
        # create request class
        $request = new \Iyzipay\Request\RetrievePaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("1");
        $request->setPaymentConversationId("123456789");

        # make request
        $payment = \Iyzipay\Model\Payment::retrieve($request, Sample::options());

        # print result
        print_r($payment);
    }
}
