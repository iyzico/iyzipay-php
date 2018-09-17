<?php

namespace Iyzipay\Model\Mapper\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkDeleteProductResource;
use Iyzipay\Model\Mapper\IyzipayResourceMapper;

class IyziLinkDeleteProductResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new IyzipayResourceMapper($rawResult);
    }

    public function mapIyziLinkDeleteProductResourceFrom(IyziLinkDeleteProductResource $create, $jsonObject)
    {
        parent::mapResourceFrom($create, $jsonObject);

        return $create;
    }

    public function mapIyziLinkDeleteProductResource(IyziLinkDeleteProductResource $create)
    {
        return $this->mapIyziLinkDeleteProductResourceFrom($create, $this->jsonObject);
    }
}