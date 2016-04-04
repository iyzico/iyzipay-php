<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new CheckoutFormAuthSample();
$sample->should_retrieve_checkout_form_auth();

class CheckoutFormAuthSample
{
    public function should_retrieve_checkout_form_auth()
    {
        # create request class
        $request = new \Iyzipay\Request\RetrieveCheckoutFormAuthRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setToken("token");

        # make request
        $checkoutFormAuth = \Iyzipay\Model\CheckoutFormAuth::retrieve($request, Sample::options());

        # print result
        print_r($checkoutFormAuth);
    }
}