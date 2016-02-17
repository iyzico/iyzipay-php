<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

# create client configuration class
$options = new \Iyzipay\Options();
$options->setApiKey("api key");
$options->setSecretKey("secret key");
$options->setBaseUrl("https://stg.iyzipay.com");

# create request class
$request = new \Iyzipay\Request\CreateCancelRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPaymentId("24");
$request->setIp("127.0.0.1");

# make request
$response = Iyzipay\Model\ConnectCancel::create($request, $options);

# print response
print_r($response);