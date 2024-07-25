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
        $url = "/reporting/settlement/payoutcompleted";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
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