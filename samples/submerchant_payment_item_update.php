<?php

require_once('config.php');

$request = new \Iyzipay\Request\SubMerchantPaymentItemUpdateRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPaymentTransactionId("11606407");
$request->setSubMerchantKey("dVNPU4zjThEHTRqlExIhh7VVSBA=");
$request->setSubMerchantPrice(0.2);

$result = \Iyzipay\Model\SubMerchantPaymentItemUpdate::create($request, Config::options());

print_r($result);


