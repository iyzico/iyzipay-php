<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Disapproval;

class DisapprovalMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new DisapprovalMapper();
    }

    public function mapDisapproval(Disapproval $disapproval, $jsonResult)
    {
        parent::mapIyzipayResource($disapproval, $jsonResult);

        if (isset($jsonResult->paymentTransactionId)) {
            $disapproval->setPaymentTransactionId($jsonResult->paymentTransactionId);
        }
        return $disapproval;
    }
}