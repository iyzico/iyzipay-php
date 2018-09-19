<?php

require_once("config.php");

$request = new \Iyzipay\Request\Iyzilink\IyziLinkSaveProductRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setName("Sample Integration");
$request->setDescription("Sample Integration");
$imagePath = __DIR__ . '/images/sample_image.jpg';
$request->setBase64EncodedImage(\Iyzipay\FileBase64Encoder::encode($imagePath));
$request->setPrice(1);
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setAddressIgnorable(false);
$request->setSoldLimit(1);
$request->setInstallmentRequest(false);
$response = \Iyzipay\Model\Iyzilink\IyziLinkSaveProduct::create($request, Config::options());

print_r($response);
