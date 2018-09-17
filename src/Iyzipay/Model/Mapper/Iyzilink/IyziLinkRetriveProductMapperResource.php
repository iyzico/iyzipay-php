<?php

namespace Iyzipay\Model\Mapper\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkRetriveProductResource;
use Iyzipay\Model\Mapper\IyzipayResourceMapper;

class IyziLinkRetriveProductMapperResource extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new IyzipayResourceMapper($rawResult);
    }

    public function mapIyziLinkRetriveProductResourceFrom(IyziLinkRetriveProductResource $create, $jsonObject)
    {
        parent::mapResourceFrom($create, $jsonObject);

        if (isset($jsonObject->data)) {
            $create->setItem($jsonObject->data);
        }
        return $create;
    }

    public function mapIyziLinkRetriveProductResource(IyziLinkRetriveProductResource $create)
    {
        return $this->mapIyziLinkRetriveProductResourceFrom($create, $this->jsonObject);
    }
}