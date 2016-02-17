<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PayoutCompletedTransactionList;

class PayoutCompletedTransactionListMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new PayoutCompletedTransactionListMapper();
    }

    public function map(PayoutCompletedTransactionList $transactionList, $jsonResult)
    {
        parent::map($transactionList, $jsonResult);
        if(isset($jsonResult->payoutCompletedTransactions)) {
            $transactionList->setPayoutCompletedTransactions($jsonResult->payoutCompletedTransactions);
        }
        return $transactionList;
    }
}