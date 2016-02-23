<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PayoutCompletedTransaction;
use Iyzipay\Model\PayoutCompletedTransactionList;

class PayoutCompletedTransactionListMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new PayoutCompletedTransactionListMapper();
    }

    public function mapPayoutCompletedTransactionList(PayoutCompletedTransactionList $transactionList, $jsonResult)
    {
        parent::mapResource($transactionList, $jsonResult);

        if (isset($jsonResult->payoutCompletedTransactions)) {
            $transactionList->setPayoutCompletedTransactions($this->mapPayoutCompletedTransactions($jsonResult->payoutCompletedTransactions));
        }
        return $transactionList;
    }

    private function mapPayoutCompletedTransactions($payoutCompletedTransactions)
    {
        $transactions = array();

        foreach ($payoutCompletedTransactions as $index => $payoutCompletedTransaction) {
            $transaction = new PayoutCompletedTransaction();

            if (isset($payoutCompletedTransaction->paymentTransactionId)) {
                $transaction->setPaymentTransactionId($payoutCompletedTransaction->paymentTransactionId);
            }
            if (isset($payoutCompletedTransaction->payoutAmount)) {
                $transaction->setPayoutAmount($payoutCompletedTransaction->payoutAmount);
            }
            if (isset($payoutCompletedTransaction->payoutType)) {
                $transaction->setPayoutType($payoutCompletedTransaction->payoutType);
            }
            if (isset($payoutCompletedTransaction->subMerchantKey)) {
                $transaction->setSubMerchantKey($payoutCompletedTransaction->subMerchantKey);
            }
            $transactions[$index] = $transaction;
        }

        return $transactions;
    }
}