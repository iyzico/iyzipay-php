<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\RetrieveSubMerchantRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setSubMerchantExternalId("AS49224");

# make request
$subMerchant = \Iyzipay\Model\SubMerchant::retrieve($request, Config::options());

# print result
print_r($subMerchant);