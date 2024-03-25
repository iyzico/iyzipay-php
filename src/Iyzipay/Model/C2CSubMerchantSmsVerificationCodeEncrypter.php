<?php

namespace Iyzipay\Model;

class C2CSubMerchantSmsVerificationCodeEncrypter {
    public static function encrypt(C2CSubMerchantApiCredentials $credentials, string $smsVerificationCode): string {
        $salt = $credentials->getSalt();
        $secretKey = $credentials->getSecretKey();

        if (is_null($salt) || is_null($secretKey)) {
            throw new \InvalidArgumentException('Please setup credentials!');
        }

        $data = hash_pbkdf2('sha256', $smsVerificationCode, $salt, 65536, 0, true);
        $initVector = openssl_random_pseudo_bytes(16, $crypto_strong);
        $ciphertext = openssl_encrypt($data, 'aes-256-cbc-hmac-sha256', $secretKey, OPENSSL_RAW_DATA, $initVector);
        return base64_encode($ciphertext);
    }
}
