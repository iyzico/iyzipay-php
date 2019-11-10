<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionRetrievePricingPlanRequest();
$request->setPricingPlanReferenceCode("6d20b09d-2650-4b92-a5be-ad1d6fbf6b1e");
$result = \Iyzipay\Model\Subscription\SubscriptionPricingPlan::retrieve($request,Config::options());
print_r($result);