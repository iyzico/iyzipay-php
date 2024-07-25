<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ReportingScrollTransaction;

class ReportingScrollTransactionMapper extends IyzipayResourceMapper {
    public static function create($rawResult = null) {
        return new ReportingScrollTransactionMapper($rawResult);
    }

    public function mapReportingScrollTransactionFrom(ReportingScrollTransaction $transaction, object $jsonObject): ReportingScrollTransaction {
        parent::mapResourceFrom($transaction, $jsonObject);

        if (isset($jsonObject->transactionDate)) {
            $transaction->setTransactionDate($jsonObject->transactionDate);
        }

        if (isset($jsonObject->documentScrollVoSortingOrder)) {
            $transaction->setDocumentScrollVoSortingOrder($jsonObject->documentScrollVoSortingOrder);
        }

        if (isset($jsonObject->lastId)) {
            $transaction->setLastId($jsonObject->lastId);
        }

        return $transaction;
    }

    public function mapReportingScrollTransaction(ReportingScrollTransaction $transaction): ReportingScrollTransaction {
        return $this->mapReportingScrollTransactionFrom($transaction, $this->jsonObject);
    }
}
