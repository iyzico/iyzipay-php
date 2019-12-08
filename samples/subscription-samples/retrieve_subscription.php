<?php

require dirname(__DIR__).'/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionDetailsRequest();
$request->setSubscriptionReferenceCode("fec5250d-1f9f-4605-bc73-db33072248f7");
$result = \Iyzipay\Model\Subscription\SubscriptionDetails::retrieve($request,Config::options());
print_r($result);