<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();
class BootstrapApprovalSample {
    function run() {
        $this->should_approve_payment_item();
        $this->should_disapprove_payment_item();
    }

    public function should_approve_payment_item() {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\CreateApprovalRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentTransactionId("2");

        # make request
        $approval = \Iyzipay\Model\Approval::create($request, $options);

        # print result
        print_r($approval);
    }

    public function should_disapprove_payment_item() {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\CreateApprovalRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentTransactionId("2");

        # make request
        $disapproval = \Iyzipay\Model\Disapproval::create($request, $options);

        # print result
        print_r($disapproval);
    }
}
