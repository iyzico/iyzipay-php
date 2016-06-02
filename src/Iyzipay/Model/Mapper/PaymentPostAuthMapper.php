<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PaymentPostAuth;

class PaymentPostAuthMapper extends PaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PaymentPostAuthMapper($rawResult);
    }

    public function mapPaymentPostAuthFrom(PaymentPostAuth $postAuth, $jsonObject)
    {
        parent::mapPaymentResourceFrom($postAuth, $jsonObject);
        return $postAuth;
    }

    public function mapPaymentPostAuth(PaymentPostAuth $postAuth)
    {
        return $this->mapPaymentPostAuthFrom($postAuth, $this->jsonObject);
    }
}