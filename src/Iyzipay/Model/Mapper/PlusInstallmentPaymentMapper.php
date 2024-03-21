<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PlusInstallmentPayment;

class PlusInstallmentPaymentMapper extends PlusInstallmentPaymentResourceMapper {
    public static function create($rawResult = null): PlusInstallmentPaymentMapper {
        return new PlusInstallmentPaymentMapper($rawResult);
    }

    public function mapPlusInstallmentPaymentFrom(PlusInstallmentPayment $payment, object $jsonObject): \Iyzipay\Model\PlusInstallmentPayment {
        parent::mapPlusInstallmentPaymentResourceFrom($payment, $jsonObject);
        return $payment;
    }

    public function mapPlusInstallmentPayment(PlusInstallmentPayment $payment): PlusInstallmentPayment {
        return $this->mapPlusInstallmentPaymentFrom($payment, $this->jsonObject);
    }
}
