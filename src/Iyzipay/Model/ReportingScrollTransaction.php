<?php

namespace Iyzipay\Model;

use Iyzipay\Options;
use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\ReportingScrollTransactionMapper;
use Iyzipay\Request\ReportingScrollTransactionRequest;
use Iyzipay\RequestStringBuilder;

class ReportingScrollTransaction extends IyzipayResource {
    private string $documentScrollVoSortingOrder;
    private string $transactionDate;
    private string $lastId;

    public static function create(ReportingScrollTransactionRequest $request, Options $options): ReportingScrollTransaction {
        $uri = $options->getBaseUrl() . '/v2/reporting/payment/scroll-transactions' . RequestStringBuilder::requestToStringQuery($request, 'reportingScrollTransaction');
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options));
        return ReportingScrollTransactionMapper::create($rawResult)->jsonDecode()->mapReportingScrollTransaction(new ReportingScrollTransaction());
    }

    public function getDocumentScrollVoSortingOrder(): string {
        return $this->documentScrollVoSortingOrder;
    }

    public function setDocumentScrollVoSortingOrder(string $documentScrollVoSortingOrder): void {
        $this->documentScrollVoSortingOrder = $documentScrollVoSortingOrder;
    }

    public function getTransactionDate(): string {
        return $this->transactionDate;
    }

    public function setTransactionDate(string $transactionDate): void {
        $this->transactionDate = $transactionDate;
    }

    public function getLastId(): string {
        return $this->lastId;
    }

    public function setLastId(string $lastId): void {
        $this->lastId = $lastId;
    }

}
