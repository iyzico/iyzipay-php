<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\RefundToAmountBased;

class RefundToAmountBasedMapper extends RefundToAmountBasedResourceMapper
{
    public static function create($rawResult = null)
    {
        return new RefundToAmountBasedMapper($rawResult);
    }

    public function mapRefundToAmountBasedFrom(RefundToAmountBased $refund, $jsonObject)
    {
        parent::mapRefundToAmountBasedResourceFrom($refund, $jsonObject);
        return $refund;
    }

    public function mapRefundToAmountBased(RefundToAmountBased $refund)
    {
        return $this->mapRefundToAmountBasedFrom($refund, $this->jsonObject);
    }
}