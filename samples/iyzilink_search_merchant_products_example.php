<?php

require_once("config.php");

function iyzilinkSearchMerchantProducts(): void {
    $request = new \Iyzipay\Request\Iyzilink\IyziLinkSearchMerchantProductsRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setPage(1);
    $request->setCount(10);
    $request->setConversationId('123456');

    $iyziLinkSearchMerchantProducts= \Iyzipay\Model\Iyzilink\IyziLinkSearchMerchantProducts::create($request,Config::options());
    print_r($iyziLinkSearchMerchantProducts);
}

iyzilinkSearchMerchantProducts();
