<?php

require_once("config.php");

function iyzilinkUpdateProductStatus(): void {
    $request = new \Iyzipay\Request\Iyzilink\IyziLinkUpdateProductStatusRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setProductStatus(\Iyzipay\Model\Status::PASSIVE);
    $request->setToken('AAM');

    $iyzilinkUpdateProductStatus = \Iyzipay\Model\Iyzilink\IyziLinkUpdateProductStatus::create($request, Config::options());
    print_r($iyzilinkUpdateProductStatus);
}

iyzilinkUpdateProductStatus();
