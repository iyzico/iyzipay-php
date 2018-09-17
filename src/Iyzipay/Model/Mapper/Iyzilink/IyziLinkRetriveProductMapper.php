<?php

namespace Iyzipay\Model\Mapper\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkRetriveProduct;

class IyziLinkRetriveProductMapper extends IyziLinkRetriveProductResourceMapper
{
    public static function create($rawResult = null)
    {
        return new IyziLinkRetriveProductMapper($rawResult);
    }

    public function mapIyziLinkRetriveProductFrom(IyziLinkRetriveProduct $create, $jsonObject)
    {
        parent::mapIyziLinkRetriveProductResourceFrom($create, $jsonObject);

        return $create;
    }

    public function mapIyziLinkRetriveProduct(IyziLinkRetriveProduct $create)
    {
        return $this->mapIyziLinkRetriveProductFrom($create, $this->jsonObject);
    }
}