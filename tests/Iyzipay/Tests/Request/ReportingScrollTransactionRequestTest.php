<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Request\ReportingScrollTransactionRequest;
use Iyzipay\Tests\TestCase;

class ReportingScrollTransactionRequestTest extends TestCase {
    public function testShouldGetJsonObject(): void {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals('123456789', $jsonObject['conversationId']);
        $this->assertEquals('2023-08-17', $jsonObject['transactionDate']);
        $this->assertEquals('ASC', $jsonObject['documentScrollVoSortingOrder']);
        $this->assertEquals('1689853839161', $jsonObject['lastId']);
    }

    private function prepareRequest(): ReportingScrollTransactionRequest {
        $request = new ReportingScrollTransactionRequest();
        $request->setConversationId('123456789');
        $request->setTransactionDate('2023-08-17');
        $request->setDocumentScrollVoSortingOrder('ASC');
        $request->setLastId('1689853839161');
        return $request;
    }
}
