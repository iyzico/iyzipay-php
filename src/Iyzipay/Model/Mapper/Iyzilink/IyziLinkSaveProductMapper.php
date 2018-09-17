<?php

namespace Iyzipay\Model\Mapper\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkSaveProduct;

class IyziLinkSaveProductMapper extends IyziLinkSaveProductResourceMapper
{
    public static function create($rawResult = null)
    {
        return new IyziLinkSaveProductMapper($rawResult);
    }

    public function mapIyziLinkSaveProductFrom(IyziLinkSaveProduct $create, $jsonObject)
    {
        parent::mapIyziLinkSaveProductResourceFrom($create, $jsonObject);

        return $create;
    }

    public function mapIyziLinkSaveProduct(IyziLinkSaveProduct $create)
    {
        return $this->mapIyziLinkSaveProductFrom($create, $this->jsonObject);
    }
}