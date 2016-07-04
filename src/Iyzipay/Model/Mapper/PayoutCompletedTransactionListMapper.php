<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PayoutCompletedTransaction;
use Iyzipay\Model\PayoutCompletedTransactionList;

class PayoutCompletedTransactionListMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PayoutCompletedTransactionListMapper($rawResult);
    }

    public function mapPayoutCompletedTransactionListFrom(PayoutCompletedTransactionList $transactionList, $jsonObject)
    {
        parent::mapResourceFrom($transactionList, $jsonObject);

        if (isset($jsonObject->payoutCompletedTransactions)) {
            $transactionList->setPayoutCompletedTransactions($this->mapPayoutCompletedTransactions($jsonObject->payoutCompletedTransactions));
        }
        return $transactionList;
    }

    public function mapPayoutCompletedTransactionList(PayoutCompletedTransactionList $transactionList)
    {
        return $this->mapPayoutCompletedTransactionListFrom($transactionList, $this->jsonObject);
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
            if (isset($payoutCompletedTransaction->currency)) {
                $transaction->setCurrency($payoutCompletedTransaction->currency);
            }
            $transactions[$index] = $transaction;
        }
        return $transactions;
    }
}