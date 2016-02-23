<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\BouncedBankTransferListMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveTransactionsRequest;

class BouncedBankTransferList extends IyzipayResource
{
    private $bankTransfers;

    public static function retrieve(RetrieveTransactionsRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/reporting/settlement/bounced", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return BouncedBankTransferListMapper::create()->mapBouncedBankTransferList(new BouncedBankTransferList(), JsonBuilder::jsonDecode($rawResult));
    }

    public function getBankTransfers()
    {
        return $this->bankTransfers;
    }

    public function setBankTransfers($bankTransfers)
    {
        $this->bankTransfers = $bankTransfers;
    }
}