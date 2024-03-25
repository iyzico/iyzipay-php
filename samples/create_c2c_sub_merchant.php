<?php

require_once('config.php');

function createC2CSubMerchant(): void {
    $request = new \Iyzipay\Request\CreateC2CSubMerchantRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId('299487456');
    $request->setName('John');
    $request->setSurname('Doe');
    $request->setEmail('email@email.com');
    $request->setGsmNumber('+905558001479');
    $request->setTckNo('55555555555');
    $request->setBirthDate('1996-10-07');
    $request->setAddress('Besiktas / Istanbul');
    $request->setExternalId('ccd74b86-e4a8-469e-b3d3-312f0544ea6e');

    $c2cSubMerchant = \Iyzipay\Model\C2CSubMerchant::create($request, Config::options());
    print_r($c2cSubMerchant);
}

createC2CSubMerchant();
