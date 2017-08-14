<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreateIyziupFormInitializeRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setMerchantOrderId("B67832");
$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
$request->setPaymentSource("ZEN-OPENCART");
$request->setForceThreeDS(0);
$request->setEnabledInstallments(array(2, 3, 6, 9));
$request->setEnabledCardFamily("Bonus");
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setPrice("1");
$request->setPaidPrice("1.2");
$request->setCallbackUrl("https://www.merchant.com/callback");
$request->setTermsUrl("https://www.merchant.com/terms");

$orderItems = array();
$firstOrderItem = new \Iyzipay\Model\OrderItem();
$firstOrderItem->setId("BI101");
$firstOrderItem->setName("Binocular");
$firstOrderItem->setCategory1("Collectibles");
$firstOrderItem->setCategory2("Accessories");
$firstOrderItem->setItemType(\Iyzipay\Model\OrderItemType::PHYSICAL);
$firstOrderItem->setPrice("0.3");
$firstOrderItem->setItemUrl("https://www.merchant.com/firstItem.html");
$OrderItems[0] = $firstOrderItem;

$secondOrderItem = new \Iyzipay\Model\OrderItem();
$secondOrderItem->setId("BI102");
$secondOrderItem->setName("Game code");
$secondOrderItem->setCategory1("Game");
$secondOrderItem->setCategory2("Online Game Items");
$secondOrderItem->setItemType(\Iyzipay\Model\OrderItemType::VIRTUAL);
$secondOrderItem->setPrice("0.5");
$secondOrderItem->setItemUrl("https://www.merchant.com/secondItem.html");
$OrderItems[1] = $secondOrderItem;

$thirdOrderItem = new \Iyzipay\Model\OrderItem();
$thirdOrderItem->setId("BI103");
$thirdOrderItem->setName("Usb");
$thirdOrderItem->setCategory1("Electronics");
$thirdOrderItem->setCategory2("Usb / Cable");
$thirdOrderItem->setItemType(\Iyzipay\Model\OrderItemType::PHYSICAL);
$thirdOrderItem->setPrice("0.2");
$thirdOrderItem->setItemUrl("https://www.merchant.com/thirdItem.html");
$OrderItems[2] = $thirdOrderItem;
$request->setOrderItems($OrderItems);

# make request
$iyziupFormInitialize = \Iyzipay\Model\IyziupFormInitialize::create($request, Config::options());

# print result
print_r($iyziupFormInitialize);