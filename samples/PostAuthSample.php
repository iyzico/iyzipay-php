<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

$sample = new PostAuthSample();
$sample->should_post_auth();

class PostAuthSample extends Sample
{
    public function should_post_auth()
    {
        # create request class
        $request = new \Iyzipay\Request\CreatePaymentPostAuthRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentId("29");
        $request->setIp("127.0.0.1");

        # make request
        $response = Iyzipay\Model\PaymentPostAuth::create($request, parent::options());

        # print response
        print_r($response);

    }
}
