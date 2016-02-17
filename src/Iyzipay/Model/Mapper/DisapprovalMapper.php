<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Disapproval;

class DisapprovalMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new DisapprovalMapper();
    }

    public function map(Disapproval $disapproval, $jsonResult)
    {
        parent::map($disapproval, $jsonResult);

        if (isset($jsonResult->paymentTransactionId)) {
            $disapproval->setPaymentTransactionId($jsonResult->paymentTransactionId);
        }
        return $disapproval;
    }
}