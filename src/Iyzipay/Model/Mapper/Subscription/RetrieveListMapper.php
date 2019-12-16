<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Subscription\RetrieveList;

class RetrieveListMapper extends RetrieveListResourceMapper
{
    public static function create($rawResult = null)
    {
        return new RetrieveListMapper($rawResult);
    }

    public function mapRetrieveListFrom(RetrieveList $create, $jsonObject)
    {
        parent::mapRetrieveListResourceFrom($create, $jsonObject);

        return $create;
    }

    public function mapRetrieveList(RetrieveList $create)
    {
        return $this->mapRetrieveListFrom($create, $this->jsonObject);
    }
}