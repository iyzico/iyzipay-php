<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PayWithIyzicoInitialize;

class PayWithIyzicoInitializeMapper extends PayWithIyzicoInitializeResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PayWithIyzicoInitializeMapper($rawResult);
    }

    public function mapPayWithIyzicoInitializeFrom(PayWithIyzicoInitialize $initialize, $jsonObject)
    {
        parent::mapPayWithIyzicoInitializeResourceFrom($initialize, $jsonObject);
        return $initialize;
    }

    public function mapPayWithIyzicoInitialize(PayWithIyzicoInitialize $initialize)
    {
        return $this->mapPayWithIyzicoInitializeFrom($initialize, $this->jsonObject);
    }
}