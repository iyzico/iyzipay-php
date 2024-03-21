<?php

require_once('config.php');

function amountBaseRefund(): void {
    $request = new \Iyzipay\Request\AmountBaseRefundRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId('123456789');
    $request->setPaymentId('2921546163');
    $request->setPrice(3.12);
    $request->setIp('85.34.78.112');

    $amountBaseRefund = \Iyzipay\Model\AmountBaseRefund::create($request, Config::options());
    print_r($amountBaseRefund);
}

amountBaseRefund();
