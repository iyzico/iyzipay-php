<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Disapproval;

class DisapprovalMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new DisapprovalMapper($rawResult);
    }

    public function mapDisapprovalFrom(Disapproval $disapproval, $jsonObject)
    {
        parent::mapResourceFrom($disapproval, $jsonObject);

        if (isset($jsonObject->paymentTransactionId)) {
            $disapproval->setPaymentTransactionId($jsonObject->paymentTransactionId);
        }
        return $disapproval;
    }

    public function mapDisapproval(Disapproval $disapproval)
    {
        return $this->mapDisapprovalFrom($disapproval, $this->jsonObject);
    }
}