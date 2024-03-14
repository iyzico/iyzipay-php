<?php

require_once('config.php');

function verifyC2CSubMerchant(): void {
    $request = new \Iyzipay\Request\VerifyC2CSubMerchantRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId('422117402');
    $request->setTxId('4973f734-e946-40dc-b3a9-34e0efb330d5');
    $request->setSmsVerificationCode('HZ87equxm70klGxX1nZX7A==');

    $c2cSubMerchant = \Iyzipay\Model\C2CSubMerchant::verify($request, Config::options());
    print_r($c2cSubMerchant);
}

verifyC2CSubMerchant();
