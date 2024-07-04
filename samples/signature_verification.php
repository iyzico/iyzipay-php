<?php

function calculateHmacSHA256Signature($params)
{
    $secretKey = Config::options()->getSecretKey();
    $dataToSign = implode(':', $params);
    $mac = hash_hmac('sha256', $dataToSign, $secretKey, true);
    return bin2hex($mac);
}
