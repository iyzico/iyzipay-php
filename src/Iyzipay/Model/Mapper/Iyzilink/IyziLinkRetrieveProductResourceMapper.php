<?php

namespace Iyzipay\Model\Mapper\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkRetrieveProductResource;
use Iyzipay\Model\Mapper\IyzipayResourceMapper;

class IyziLinkRetrieveProductResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new IyzipayResourceMapper($rawResult);
    }

    public function mapIyziLinkRetriveProductResourceFrom(IyziLinkRetrieveProductResource $create, $jsonObject)
    {
        parent::mapResourceFrom($create, $jsonObject);

        if (isset($jsonObject->data)) {
            $create->setItem($jsonObject->data);
        }
        return $create;
    }
}