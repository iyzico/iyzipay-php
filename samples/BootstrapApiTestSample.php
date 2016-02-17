<?php

use Iyzipay\Model\ApiTest;

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

# create client configuration class
$options = new \Iyzipay\Options();
$options->setApiKey("api key");
$options->setSecretKey("secret key");
$options->setBaseUrl("https://stg.iyzipay.com");

# create request class
$response = ApiTest::retrieve($options);

#print response
print_r($response);