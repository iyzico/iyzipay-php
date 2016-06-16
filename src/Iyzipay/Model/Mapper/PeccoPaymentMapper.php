<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PeccoPayment;

class PeccoPaymentMapper extends PaymentResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PeccoPaymentMapper($rawResult);
    }

    public function mapPeccoPaymentFrom(PeccoPayment $auth, $jsonObject)
    {
        parent::mapPaymentResourceFrom($auth, $jsonObject);

        if (isset($jsonObject->token)) {
            $auth->setToken($jsonObject->token);
        }
        return $auth;
    }

    public function mapPeccoPayment(PeccoPayment $auth)
    {
        return $this->mapPeccoPaymentFrom($auth, $this->jsonObject);
    }
}