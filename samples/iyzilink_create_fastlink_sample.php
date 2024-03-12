<?php

require_once("config.php");

function iyzilinkCreateFastLink() {
    $imagePath = __DIR__ . '/images/sample_image.jpg';

    $request = new \Iyzipay\Request\Iyzilink\IyziLinkCreateFastLinkRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId("123456789");
    $request->setDescription("ft-description-fast-link");
    $request->setPrice(10);
    $request->setCurrencyCode("TRY");
    $request->setSourceType("WEB");

    $iyzilinkFastLink = \Iyzipay\Model\Iyzilink\IyziLinkFastLink::create($request, Config::options());
    print_r($iyzilinkFastLink);
}

iyzilinkCreateFastLink();
