<?php

require_once('config.php');

$request = new \Iyzipay\Request\Iyzilink\IyziLinkSaveProductRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId(uniqid());
$request->setName("Sample Integration");
$request->setDescription("Sample Integration");
$imagePath = __DIR__ . '/images/sample_image.jpg';
$request->setBase64EncodedImage(\Iyzipay\Base64FileHelper::encode($imagePath));
$request->setPrice(2);
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setAddressIgnorable(false);
$request->setSoldLimit(1);
$request->setInstallmentRequest(false);
$response = \Iyzipay\Model\Iyzilink\IyziLinkUpdateProduct::create($request, Config::options(),'AAVdlw');

print_r($response);
