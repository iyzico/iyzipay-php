<?php

namespace Iyzipay\Model\Mapper\Subscription;

use Iyzipay\Model\Mapper\IyzipayResourceMapper;
use Iyzipay\IyzipayResource;
class SubscriptionActionResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubscriptionActionResourceMapper($rawResult);
    }

    public function mapSubscriptionActionResourceFrom(IyzipayResource $create, $jsonObject)
    {
        parent::mapResourceFrom($create, $jsonObject);
        return $create;
    }
    public function mapSubscriptionAction($create)
    {
        return $this->mapSubscriptionActionResourceFrom($create, $this->jsonObject);
    }
}