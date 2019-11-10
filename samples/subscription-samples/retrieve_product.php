<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionRetrieveProductRequest();
$request->setProductReferenceCode("3866b3c3-2750-494b-9f0e-89e77f8c0283");
$result = \Iyzipay\Model\Subscription\SubscriptionProduct::retrieve($request,Config::options());
print_r($result);