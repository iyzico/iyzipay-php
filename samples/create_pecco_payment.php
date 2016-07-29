<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreatePeccoPaymentRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setToken("token");

# make request
$peccoPayment = \Iyzipay\Model\PeccoPayment::create($request, Config::options());

# print result
print_r($peccoPayment);
