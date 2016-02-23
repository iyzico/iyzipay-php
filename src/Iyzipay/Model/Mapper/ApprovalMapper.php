<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Approval;

class ApprovalMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new ApprovalMapper();
    }

    public function mapApproval(Approval $approval, $jsonResult)
    {
        parent::mapResource($approval, $jsonResult);

        if (isset($jsonResult->paymentTransactionId)) {
            $approval->setPaymentTransactionId($jsonResult->paymentTransactionId);
        }
        return $approval;
    }
}