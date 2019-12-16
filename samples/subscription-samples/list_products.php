<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionListProductsRequest();
$request->setPage(1);
$request->setCount(10);
$result = \Iyzipay\Model\Subscription\RetrieveList::products($request,Config::options());
print_r($result);