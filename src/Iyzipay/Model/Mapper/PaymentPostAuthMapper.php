<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PaymentPostAuth;

class PaymentPostAuthMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new PaymentPostAuthMapper();
    }

    public function mapPaymentPostAuth(PaymentPostAuth $postAuth, $jsonResult)
    {
        parent::mapResource($postAuth, $jsonResult);

        if (isset($jsonResult->paymentId)) {
            $postAuth->setPaymentId($jsonResult->paymentId);
        }
        if (isset($jsonResult->price)) {
            $postAuth->setPrice($jsonResult->price);
        }
        return $postAuth;
    }
}