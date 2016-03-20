<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\BouncedBankTransferListMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveTransactionsRequest;

class BouncedBankTransferList extends IyzipayResource
{
    private $bankTransfers;

    public static function retrieve(RetrieveTransactionsRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/reporting/settlement/bounced", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return BouncedBankTransferListMapper::create($rawResult)->jsonDecode()->mapBouncedBankTransferList(new BouncedBankTransferList());
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