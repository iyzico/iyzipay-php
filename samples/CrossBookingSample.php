<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new CrossBookingSample;
$sample->should_send_money_to_sub_merchant();
$sample->should_receive_money_from_sub_merchant();

class CrossBookingSample
{
    public function should_send_money_to_sub_merchant()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateCrossBookingRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubmerchantKey("sub merchant key");
        $request->setPrice("1");
        $request->setReason("reason text");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        # make request
        $crossBookingToSubMerchant = \Iyzipay\Model\CrossBookingToSubMerchant::create($request, Sample::options());

        # print result
        print_r($crossBookingToSubMerchant);
    }

    public function should_receive_money_from_sub_merchant()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateCrossBookingRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubmerchantKey("sub merchant key");
        $request->setPrice("1");
        $request->setReason("reason text");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        # make request
        $crossBookingFromSubMerchant = \Iyzipay\Model\CrossBookingFromSubMerchant::create($request, Sample::options());

        # print result
        print_r($crossBookingFromSubMerchant);
    }
}