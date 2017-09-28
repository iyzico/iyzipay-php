<?php

require_once("Config.php");

$options = Config::options();
$options->setBaseUrl("https://sandbox-api-tls12.iyzipay.com");

$iyzipayResource = \Iyzipay\Model\ApiTest::retrieve($options);

$tlsWarningMessage = "WARNING! Minimum TLS v1.2 will be supported after March 2018. Please upgrade your openssl version to minimum 1.0.1. 
If you have any questions, please open an issue on Github or contact us at integration@iyzico.com.";
if ($iyzipayResource->getStatus() == "success") {
    print_r($iyzipayResource);
} else {
    print_r($tlsWarningMessage);
}