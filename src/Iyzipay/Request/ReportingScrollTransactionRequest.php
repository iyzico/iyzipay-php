<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class ReportingScrollTransactionRequest extends Request {
    private string $documentScrollVoSortingOrder;
    private string $transactionDate;
    private string $lastId;

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

    public function getJsonObject(): array {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add('documentScrollVoSortingOrder', $this->getDocumentScrollVoSortingOrder())
            ->add('transactionDate', $this->getTransactionDate())
            ->add('lastId', $this->getLastId())
            ->getObject();
    }
}
