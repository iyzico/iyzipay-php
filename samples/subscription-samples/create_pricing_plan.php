<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionCreatePricingPlanRequest();
$request->setLocale('tr');
$request->setConversationId('123456789');
$request->setProductReferenceCode('ac188383-d30e-490e-94bb-239ff6af4b5b');
$request->setName('testPlan');
$request->setPrice('30.0');
$request->setCurrencyCode('TRY');
$request->setPaymentInterval('WEEKLY');
$request->setPaymentIntervalCount(1);
$request->setTrialPeriodDays(30);
$request->setRecurrenceCount(5);
$request->setPlanPaymentType('RECURRING');
$result = \Iyzipay\Model\Subscription\SubscriptionPricingPlan::create($request,Config::options());
print_r($result);