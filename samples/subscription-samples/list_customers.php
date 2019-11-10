<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionListCustomersRequest();
$request->setPage(1);
$request->setCount(100);
$result = \Iyzipay\Model\Subscription\RetrieveList::customers($request,Config::options());
print_r($result);