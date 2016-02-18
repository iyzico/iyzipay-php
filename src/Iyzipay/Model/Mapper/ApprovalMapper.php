<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Approval;

class ApprovalMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new ApprovalMapper();
    }

    public function map(Approval $approval, $jsonResult)
    {
        parent::map($approval, $jsonResult);

        if (isset($jsonResult->paymentTransactionId)) {
            $approval->setPaymentTransactionId($jsonResult->paymentTransactionId);
        }
        return $approval;
    }
}