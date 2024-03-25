<?php

require_once('config.php');

function verifyC2CSubMerchant(): void {
    $credentials = new \Iyzipay\Model\C2CSubMerchantApiCredentials();
    $credentials->setSalt('Merchant onboarding salt');
    $credentials->setSecretKey('Merchant onboarding secret key');

    $encryptedVerificationCode = \Iyzipay\Model\C2CSubMerchantSmsVerificationCodeEncrypter::encrypt($credentials, '123456');

    $request = new \Iyzipay\Request\VerifyC2CSubMerchantRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId('422117402');
    $request->setTxId('txId obtained from create subMerchant');

//    Encrypted code won't work in Sandbox
    $request->setSmsVerificationCode($encryptedVerificationCode);

    $c2cSubMerchant = \Iyzipay\Model\C2CSubMerchant::verify($request, Config::options());
    print_r($c2cSubMerchant);
}

verifyC2CSubMerchant();
