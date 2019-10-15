<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreateSettlementToBalanceRequest();
$request->setSubMerchantKey("11654127");
$request->setCallbackUrl("https://www.callback");
$request->setPrice("0.1");

# make request
$settlementToBalance = \Iyzipay\Model\SettlementToBalance::create($request, Config::options());

echo '<pre>';
# print result
print_r($settlementToBalance);