<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionCreateCustomerRequest();
$request->setLocale("tr");
$request->setConversationId("1234567789");
$customer = new \Iyzipay\Model\Customer();
$customer->setName("John");
$customer->setSurname("Doe");
$customer->setGsmNumber("+905555555555");
$customer->setEmail("johndoe@iyzicotest.com");
$customer->setIdentityNumber("11111111111");
$customer->setShippingAddressContactName("John Doe");
$customer->setShippingAddressCity("Istanbul");
$customer->setShippingAddressCountry("Turkey");
$customer->setShippingAddressAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
$customer->setShippingAddressZipCode("34660");
$customer->setBillingAddressContactName("John Doe");
$customer->setBillingAddressCity("Istanbul");
$customer->setBillingAddressCountry("Turkey");
$customer->setBillingAddressAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
$customer->setBillingAddressZipCode("34660");
$request->setCustomer($customer);
$result = \Iyzipay\Model\Subscription\SubscriptionCustomer::create($request,Config::options());
print_r($result);