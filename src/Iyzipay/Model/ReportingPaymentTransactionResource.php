<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;

class ReportingPaymentTransactionResource extends IyzipayResource
{
    private $transactions;
    private $currentPage;
    private $totalPageCount;

    public function getTransactions()
    {
        return $this->transactions;
    }

    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;

    }

    public function getTotalPageCount()
    {
        return $this->totalPageCount;
    }

    public function setTotalPageCount($totalPageCount)
    {
        $this->totalPageCount = $totalPageCount;
    }
}