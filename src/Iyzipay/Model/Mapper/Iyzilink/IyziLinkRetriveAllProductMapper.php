<?php

namespace Iyzipay\Model\Mapper\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkRetriveAllProduct;

class IyziLinkRetriveAllProductMapper extends IyziLinkRetriveAllProductMapperResource
{
    public static function create($rawResult = null)
    {
        return new IyziLinkRetriveAllProductMapper($rawResult);
    }

    public function mapIyziLinkRetriveAllProductFrom(IyziLinkRetriveAllProduct $create, $jsonObject)
    {
        parent::mapIyziLinkRetriveAllProductResourceFrom($create, $jsonObject);

        return $create;
    }

    public function mapIyziLinkRetriveAllProduct(IyziLinkRetriveAllProduct $create)
    {
        return $this->mapIyziLinkRetriveAllProductFrom($create, $this->jsonObject);
    }
}