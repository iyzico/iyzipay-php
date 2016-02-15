<?php

require_once('../vendor/autoload.php');

# create client configuration class
$options = new \Iyzipay\Options();
$options->setApiKey("api key");
$options->setSecretKey("secret key");
$options->setBaseUrl("https://stg.iyzipay.com");

# create request class
$request = new \Iyzipay\Request\RetrieveBinNumberRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setBinNumber("554960");

# make request
$binNumber = \Iyzipay\Model\BinNumber::retrieve($request, $options);

# print response
print_r($binNumber);