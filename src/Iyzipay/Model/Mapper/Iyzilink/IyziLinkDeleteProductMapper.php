<?php

namespace Iyzipay\Model\Mapper\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkDeleteProduct;

class IyziLinkDeleteProductMapper extends IyziLinkDeleteProductResourceMapper
{
    public static function create($rawResult = null)
    {
        return new IyziLinkDeleteProductMapper($rawResult);
    }

    public function mapIyziLinkDeleteProductFrom(IyziLinkDeleteProduct $create, $jsonObject)
    {
        parent::mapIyziLinkDeleteProductResourceFrom($create, $jsonObject);
        return $create;
    }

    public function mapIyziLinkDeleteProduct(IyziLinkDeleteProduct $create)
    {
        return $this->mapIyziLinkDeleteProductFrom($create, $this->jsonObject);
    }
}