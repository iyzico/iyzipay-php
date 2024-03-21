<?php

require_once('config.php');

function reportingScrollTransaction(): void {
    $request = new \Iyzipay\Request\ReportingScrollTransactionRequest();
    $request->setConversationId('1234567890');
    $request->setTransactionDate('2023-08-17');
    $request->setDocumentScrollVoSortingOrder('ASC');
    $request->setLastId('1689853839161');

    $result = \Iyzipay\Model\ReportingScrollTransaction::create($request, Config::options());
    print_r($result);
}

reportingScrollTransaction();
