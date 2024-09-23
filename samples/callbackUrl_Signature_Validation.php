<?php

/* You can verify the request using the method below */

$secretKey = "merchant_secret_key";
$conversationData = "conversationData_from_callbackUrl";
$conversationId = "conversationId_from_callbackUrl";
$mdStatus = "mdStatus_from_callbackUrl";
$paymentId = "paymentId_from_callbackUrl";
$status = "status_from_callbackUrl";

$dataToSign = $conversationData.":".$conversationId.":".$mdStatus.":".$paymentId.":".$status ;
$hmac256Signature = bin2hex(hash_hmac('sha256', $dataToSign, $secretKey, true));

$signature = "signature_from_callbackUrl_payload";

if ($hmac256Signature == $signature) {
    echo "HMAC-SHA256 Signature Verified: " . $hmac256Signature . "\n";
    echo "Enjoy your code...";
} else {
    echo "Signature verification failed.\n";
}


/*
* Sample Signature Calculation
*
* Payload: status=success&paymentId=22484292&conversationData=&conversationId=&mdStatus
* =1&signature=a4f73b80bb32a6ef8358090bbd8609a49a7b53f463048f8ef147496e236d04f0
* 
* $secretKey = "jLc7GQHD2pyJoqXDeEcTnGHYtP7Ai5jl";
* $conversationData = "";
* $conversationId = "";
* $mdStatus = "1";
* $paymentId = "22484292";
* $status = "success";
*
* $signature = "a4f73b80bb32a6ef8358090bbd8609a49a7b53f463048f8ef147496e236d04f0";
*
* $dataToSign = "::1:22484292:success";
*
* After hashing string with secretKey
* $hmac256Signature = "a4f73b80bb32a6ef8358090bbd8609a49a7b53f463048f8ef147496e236d04f0";
*
* $hmac256Signature is equal to $signature so the request validated.
*/



?>