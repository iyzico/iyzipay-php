<?php

/* You can verify the request using the method below */
/* For CO Form and Pay with iyzico                   */

$secretKey = "merchant_secret_key";
$iyziEventType = "iyziEventType_from_webhook_payload";
$iyziPaymentId = "iyziPaymentId_from_webhook_payload";
$token = "token_from_webhook_payload";
$paymentConversationId = "paymentConversationId_from_webhook_payload";
$status = "status_from_webhook_payload";

$key = $secretKey.$iyziEventType.$iyziPaymentId.$token.$paymentConversationId.$status;
$hmac256Signature = bin2hex(hash_hmac('sha256', $key, $secretKey, true));

$signature_v3 = "signature_v3_from_webhook_header";

if ($hmac256Signature == $signature_v3) {
    echo "HMAC-SHA256 Signature Verified: " . $hmac256Signature . "\n";
    echo "Enjoy your code...";
} else {
    echo "Signature verification failed.\n";
}

/* For Direct Payments via API                   */

$secretKey = "merchant_secret_key";
$iyziEventType = "iyziEventType_from_webhook_payload";
$paymentId = "iyziPaymentId_from_webhook_payload";
$paymentConversationId = "paymentConversationId_from_webhook_payload";
$status = "status_from_webhook_payload";

$key = $secretKey.$iyziEventType.$paymentId.$paymentConversationId.$status;
$hmac256Signature = bin2hex(hash_hmac('sha256', $key, $secretKey, true));

$signature_v3 = "signature_v3_from_webhook_header";

if ($hmac256Signature == $signature_v3) {
    echo "HMAC-SHA256 Signature Verified: " . $hmac256Signature . "\n";
    echo "Enjoy your code...";
} else {
    echo "Signature verification failed.\n";
}

/*
* Sample X-Iyz-Signature-V3 Calculation - For CO Form and Pay with iyzico
*
* Payload: {"paymentConversationId":"conversationId","merchantId":3382172,"token":"e828c62d-fd12-4b1
* a-ad5a-380f15fe6596","status":"SUCCESS","iyziReferenceCode":"77e1635c-6b39-475a-8b7b-ca15ad0cd4ac"
* ,"iyziEventType":"CHECKOUT_FORM_AUTH","iyziEventTime":1721825036103,"iyziPaymentId":22483975}
*
* Header: X-Iyz-Signature-V3: 4031c575763486a2d2bf3f7ace0baebfcd6bed65393ab4df3fe80c00d5fd6878
* 
* $secretKey = "sandbox-UuLnD7wZa0a3DmytfIrwHQqAMfqCNJrs";
* $iyziEventType = "CHECKOUT_FORM_AUTH";
* $iyziPaymentId = "22483975";
* $token = "e828c62d-fd12-4b1a-ad5a-380f15fe6596";
* $paymentConversationId = "conversationId";
* $status = "SUCCESS";
*
* $signatureV3: 4031c575763486a2d2bf3f7ace0baebfcd6bed65393ab4df3fe80c00d5fd6878
*
* $dataToSign = "sandbox-UuLnD7wZa0a3DmytfIrwHQqAMfqCNJrsCHECKOUT_FORM_AUTH22483975e828c62d-fd12-4b1
* a-ad5a-380f15fe6596conversationIdSUCCESS";
*
* After hashing string with secretKey
* $hmac256Signature = "4031c575763486a2d2bf3f7ace0baebfcd6bed65393ab4df3fe80c00d5fd6878";
*
* $hmac256Signature is equal to $signatureV3 so the request validated.
*/

/*
* Sample X-Iyz-Signature-V3 Calculation - For Direct Payments via API
*
* Payload: {"paymentConversationId":"conversationId","merchantId":3382172,"paymentId":22484059,"stat
* us":"SUCCESS","iyziReferenceCode":"a9af8e6b-4401-4928-b6b8-40419aaa3d0f","iyziEventType":"API_AUTH
* ","iyziEventTime":1721825828467,"iyziPaymentId":22484059}
*
* Header: X-Iyz-Signature-V3: 92c7a72b7741bc83eb696066605c894778c87297b2c88d6037670666230e18ae
* 
* $secretKey = "sandbox-UuLnD7wZa0a3DmytfIrwHQqAMfqCNJrs";
* $iyziEventType = "API_AUTH";
* $paymentId = "22484059";
* $paymentConversationId = "conversationId";
* $status = "SUCCESS";
*
* $signatureV3: 92c7a72b7741bc83eb696066605c894778c87297b2c88d6037670666230e18ae
*
* $dataToSign = "sandbox-UuLnD7wZa0a3DmytfIrwHQqAMfqCNJrsAPI_AUTH22484059conversationIdSUCCESS";
*
* After hashing string with secretKey
* $hmac256Signature = "92c7a72b7741bc83eb696066605c894778c87297b2c88d6037670666230e18ae";
*
* $hmac256Signature is equal to $signatureV3 so the request validated.
*/


?>