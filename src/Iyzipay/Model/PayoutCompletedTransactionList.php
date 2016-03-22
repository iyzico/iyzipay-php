<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\PayoutCompletedTransactionListMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveTransactionsRequest;

class PayoutCompletedTransactionList extends IyzipayResource
{
    private $payoutCompletedTransactions;

    public static function retrieve(RetrieveTransactionsRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/reporting/settlement/payoutcompleted", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PayoutCompletedTransactionListMapper::create($rawResult)->jsonDecode()->mapPayoutCompletedTransactionList(new PayoutCompletedTransactionList());
    }

    public function getPayoutCompletedTransactions()
    {
        return $this->payoutCompletedTransactions;
    }

    public function setPayoutCompletedTransactions($payoutCompletedTransactions)
    {
        $this->payoutCompletedTransactions = $payoutCompletedTransactions;
    }
}