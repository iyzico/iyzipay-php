<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();
class BootstrapRefundSample
{
    public function run() {
        $this->should_refund();
        $this->should_refund_charged_from_merchant();
    }

    public function should_refund() {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\CreateRefundRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentTransactionId("50");
        $request->setPrice("0.1");
        $request->setIp("127.0.0.1");

        # make request
        $response = Iyzipay\Model\Refund::create($request, $options);

        # print response
        print_r($response);
    }

    public function should_refund_charged_from_merchant() {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\CreateRefundRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentTransactionId("41");
        $request->setPrice("0.05");
        $request->setIp("127.0.0.1");

        # make request
        $response = Iyzipay\Model\RefundChargedFromMerchant::create($request, $options);

        # print response
        print_r($response);
    }
}