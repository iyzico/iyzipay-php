<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreatePayWithIyzicoWidgetInitializeRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPrice("1500.0");
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setInstallment(6);

$basketItems = array();
$firstBasketItem = new \Iyzipay\Model\PayWithIyzicoWidgetBasketItem();
$firstBasketItem->setPrice("1000.0");
$firstBasketItem->setName("Laptop");
$firstBasketItem->setCategory("PC");
$basketItems[0] = $firstBasketItem;

$secondBasketItem = new \Iyzipay\Model\PayWithIyzicoWidgetBasketItem();
$secondBasketItem->setPrice("500.0");
$secondBasketItem->setName("Mouse");
$secondBasketItem->setCategory("Others");
$basketItems[1] = $secondBasketItem;
$request->setBasketItems($basketItems);

# make request
$widgetInitialize = \Iyzipay\Model\PayWithIyzicoWidgetInitialize::create($request, Config::options());

# print result
print_r($widgetInitialize);
