<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\AmountBaseRefund;

class AmountBaseRefundMapper extends IyzipayResourceMapper {
    public static function create($rawResult = null): AmountBaseRefundMapper {
        return new AmountBaseRefundMapper($rawResult);
    }

    public function mapAmountBaseRefundFrom(AmountBaseRefund $amountBaseRefund, object $jsonObject): AmountBaseRefund {
        parent::mapResourceFrom($amountBaseRefund, $jsonObject);

        if (isset($jsonObject->paymentId)) {
            $amountBaseRefund->setPaymentId($jsonObject->paymentId);
        }

        if (isset($jsonObject->price)) {
            $amountBaseRefund->setPrice($jsonObject->price);
        }

        if (isset($jsonObject->ip)) {
            $amountBaseRefund->setIp($jsonObject->ip);
        }

        return $amountBaseRefund;
    }

    public function mapAmountBaseRefund(AmountBaseRefund $amountBaseRefund): AmountBaseRefund {
        return $this->mapAmountBaseRefundFrom($amountBaseRefund, $this->jsonObject);
    }
}
