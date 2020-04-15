<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionUpdateCustomerRequest();
$request->setLocale("tr");
$request->setConversationId("1234567789");
$request->setCustomerReferenceCode("66c238cf-faf5-4d42-bfed-642d47b74aac");
$customer = new \Iyzipay\Model\Customer();
$customer->setName("John");
$customer->setSurname("Doe");
$customer->setEmail("johndoe@iyzico.com");
$customer->setGsmNumber("+905555555111");
$customer->setIdentityNumber("11111111111");
$customer->setShippingContactName("John Doe");
$customer->setShippingCity("Istanbul");
$customer->setShippingDistrict("altunizade");
$customer->setShippingCountry("Turkey");
$customer->setShippingAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
$customer->setShippingZipCode("34660");
$customer->setBillingContactName("John Doe");
$customer->setBillingCity("Istanbul");
$customer->setBillingDistrict("altunizade");
$customer->setBillingCountry("Turkey");
$customer->setBillingAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
$customer->setBillingZipCode("34660");
$request->setCustomer($customer);
$result = \Iyzipay\Model\Subscription\SubscriptionCustomer::update($request,Config::options());
print_r($result);