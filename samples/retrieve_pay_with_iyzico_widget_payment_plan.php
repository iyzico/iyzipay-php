<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\RetrievePayWithIyzicoWidgetPaymentPlanRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setWidgetToken("widget-token");

# make request
$paymentPlan = \Iyzipay\Model\PayWithIyzicoWidgetPaymentPlan::retrieve($request, Config::options());

# print result
print_r($paymentPlan);
