<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

# create client configuration class
$options = new \Iyzipay\Options();
$options->setApiKey("api key");
$options->setSecretKey("secret key");
$options->setBaseUrl("https://stg.iyzipay.com");

# create request class
$request = new \Iyzipay\Request\RetrieveInstallmentInfoRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setBinNumber("554960");
$request->setPrice("1");

# make request
$response = Iyzipay\Model\InstallmentInfo::create($request, $options);

# print response
print_r($response);