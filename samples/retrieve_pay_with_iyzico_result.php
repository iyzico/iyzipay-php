<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\RetrievePayWithIyzicoRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setToken("token");

# make request
$payWithIyzico = \Iyzipay\Model\PayWithIyzico::retrieve($request, Config::options());

# print result
print_r($payWithIyzico);