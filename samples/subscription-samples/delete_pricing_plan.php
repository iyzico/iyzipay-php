<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionDeletePricingPlanRequest();
$request->setPricingPlanReferenceCode("6d20b09d-2650-4b92-a5be-ad1d6fbf6b1e");
$request->setLocale("tr");
$request->setConversationId("123456789");
$result = \Iyzipay\Model\Subscription\SubscriptionPricingPlan::delete($request, Config::options());
print_r($result);