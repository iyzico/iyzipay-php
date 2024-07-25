<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ReportingScrollTransaction;
use Iyzipay\Request\ReportingScrollTransactionRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ReportingScrollTransactionTest extends IyzipayResourceTestCase {
    public function testShouldReportingScrollTransaction(): void {

        $request = new ReportingScrollTransactionRequest();
        $request->setConversationId('1234567890');
        $request->setTransactionDate('2023-08-17');
        $request->setDocumentScrollVoSortingOrder('ASC');
        $request->setLastId('1689853839161');

        $this->expectHttpGetV2();
        $transaction = ReportingScrollTransaction::create($request, $this->options);
        $this->verifyResource($transaction);
    }
}
