<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionUpdatePricingPlanRequest();
$request->setLocale('tr');
$request->setConversationId('123456789');
$request->setPricingPlanReferenceCode("6d20b09d-2650-4b92-a5be-ad1d6fbf6b1e");
$request->setName("updatedName");
$request->setTrialPeriodDays(10);
$result = \Iyzipay\Model\Subscription\SubscriptionPricingPlan::update($request,Config::options());
print_r($result);