<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new BasicPaymentPostAuthSample();
$sample->should_post_auth();

class BasicPaymentPostAuthSample
{
    public function should_post_auth()
    {
        # create request class
        $request = new \Iyzipay\Request\CreatePaymentPostAuthRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("1");
        $request->setPaidPrice("0.6");
        $request->setIp("85.34.78.112");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        # make request
        $basicPaymentPostAuth = \Iyzipay\Model\BasicPaymentPostAuth::create($request, Sample::options());

        # print result
        print_r($basicPaymentPostAuth);
    }
}
