<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PaymentPostAuth;

class PaymentPostAuthMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PaymentPostAuthMapper($rawResult);
    }

    public function mapPaymentPostAuthFrom(PaymentPostAuth $postAuth, $jsonObject)
    {
        parent::mapResourceFrom($postAuth, $jsonObject);

        if (isset($jsonObject->paymentId)) {
            $postAuth->setPaymentId($jsonObject->paymentId);
        }
        if (isset($jsonObject->price)) {
            $postAuth->setPrice($jsonObject->price);
        }
        if (isset($jsonObject->price)) {
            $postAuth->setPaidPrice($jsonObject->paidPrice);
        }
        return $postAuth;
    }

    public function mapPaymentPostAuth(PaymentPostAuth $postAuth)
    {
        return $this->mapPaymentPostAuthFrom($postAuth, $this->jsonObject);
    }
}