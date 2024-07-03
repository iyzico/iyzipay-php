<?php

function calculateHmacSHA256Signature($paymentId, $redirectUrl, $currency, $basketId, $conversationId, $paidPrice, $price, $token, $secretKey) {
    $params = [$paymentId, $redirectUrl, $currency, $basketId, $conversationId, $paidPrice, $price, $token];
    $dataToSignArray = array();

    foreach ($params as $param) {
        $param && $dataToSignArray[] = $param;
    }

    $dataToSign = implode(':', $dataToSignArray);
    $mac = hash_hmac('sha256', $dataToSign, $secretKey, true);
    return bin2hex($mac);
}