<?php

namespace Iyzipay\Model\Mapper\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkRetrieveProduct;

class IyziLinkRetrieveProductMapper extends IyziLinkRetrieveProductResourceMapper
{
    public static function create($rawResult = null)
    {
        return new IyziLinkRetrieveProductMapper($rawResult);
    }

    public function mapIyziLinkRetriveProductFrom(IyziLinkRetrieveProduct $create, $jsonObject)
    {
        parent::mapIyziLinkRetriveProductResourceFrom($create, $jsonObject);

        if (isset($jsonObject->data)) {
            $create->setItem($jsonObject->data);
        }

        return $create;
    }

    public function mapIyziLinkRetriveProduct(IyziLinkRetrieveProduct $create)
    {
        return $this->mapIyziLinkRetriveProductFrom($create, $this->jsonObject);
    }
}