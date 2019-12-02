<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionListPricingPlanRequest();
$request->setPage(1);
$request->setCount(3);
$request->setProductReferenceCode("e768c480-1ab7-4f14-b4cb-1a3af720fce9");
$result = \Iyzipay\Model\Subscription\RetrieveList::pricingPlan($request,Config::options());
print_r($result);