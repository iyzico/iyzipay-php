<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionSearchRequest();
$request->setPage(1);
$request->setCount(10);
$request->setSubscriptionStatus('ACTIVE');
$request->setStartDate('2018-10-05');
$request->setEndDate('2019-10-05');
$request->setPricingPlanReferenceCode('c1d489b6-9adc-42fa-88ae-47ea2e5dbe1e');
$result = \Iyzipay\Model\Subscription\RetrieveList::subscriptions($request,Config::options());
print_r($result);