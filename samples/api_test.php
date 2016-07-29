<?php

require_once('config.php');

# make request
$iyzipayResource = \Iyzipay\Model\ApiTest::retrieve(Config::options());

# print result
print_r($iyzipayResource);