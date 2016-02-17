<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

# create client configuration class
$options = new \Iyzipay\Options();
$options->setApiKey("api key");
$options->setSecretKey("secret key");
$options->setBaseUrl("https://stg.iyzipay.com");

# create request class
$request = new \Iyzipay\Request\CreateRefundRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPaymentTransactionId("29");
$request->setPrice("1.0");
$request->setIp("127.0.0.1");

# make request
$response = Iyzipay\Model\ConnectRefund::create($request, $options);

# print response
print_r($response);