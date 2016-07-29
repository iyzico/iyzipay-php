<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreateThreedsPaymentRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPaymentId("1");
$request->setConversationData("conversation data");

# make request
$threedsPayment = \Iyzipay\Model\ThreedsPayment::create($request, Config::options());

# print result
print_r($threedsPayment);