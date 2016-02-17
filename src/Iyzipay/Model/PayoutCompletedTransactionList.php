<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\PayoutCompletedTransactionListMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveTransactionsRequest;

class PayoutCompletedTransactionList extends IyzipayResource
{
    private $payoutCompletedTransactions;

    public static function create(RetrieveTransactionsRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/reporting/settlement/payoutcompleted", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PayoutCompletedTransactionListMapper::create()->map(new PayoutCompletedTransactionList(), JsonBuilder::jsonDecode($rawResult));
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