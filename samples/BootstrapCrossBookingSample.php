<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();
class BootstrapCrossBookingSample
{
    public function run() {
        $this->should_receive_money_from_sub_merchant();
        $this->should_send_money_to_sub_merchant();
    }

    public function should_send_money_to_sub_merchant() {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\CreateCrossBookingRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubmerchantKey("subMerchantKey");
        $request->setPrice("1");
        $request->setReason("reason text");

        # make request
        $response = Iyzipay\Model\CrossBookingFromSubMerchant::create($request, $options);

        # print response
        print_r($response);
    }

    public function should_receive_money_from_sub_merchant() {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\CreateCrossBookingRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubmerchantKey("subMerchantKey");
        $request->setPrice("1");
        $request->setReason("reason text");

        # make request
        $response = Iyzipay\Model\CrossBookingFromSubMerchant::create($request, $options);

        # print response
        print_r($response);
    }
}