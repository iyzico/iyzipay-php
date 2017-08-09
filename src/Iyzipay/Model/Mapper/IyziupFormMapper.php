<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Address;
use Iyzipay\Model\Consumer;
use Iyzipay\Model\IyziupForm;
use Iyzipay\Model\PaymentResource;

class IyziupFormMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new IyziupFormMapper($rawResult);
    }

    public function mapIyziupFormFrom(IyziupForm $iyziupForm, $jsonObject)
    {
        parent::mapResourceFrom($iyziupForm, $jsonObject);

        if (isset($jsonObject->orderResponseStatus)) {
            $iyziupForm->setOrderResponseStatus($jsonObject->orderResponseStatus);
        }
        if (isset($jsonObject->token)) {
            $iyziupForm->setToken($jsonObject->token);
        }
        if (isset($jsonObject->callbackUrl)) {
            $iyziupForm->setCallbackUrl($jsonObject->callbackUrl);
        }

        if (isset($jsonObject->consumer)) {
            $iyziupForm->setConsumer(ConsumerMapper::create($jsonObject->consumer)->mapConsumerFrom(new Consumer(), $jsonObject->consumer));
        }

        if (isset($jsonObject->shippingAddress)) {
            $iyziupForm->setShippingAddress(AddressMapper::create($jsonObject->shippingAddress)->mapAddressFrom(new Address(), $jsonObject->shippingAddress));
        }

        if (isset($jsonObject->billingAddress)) {
            $iyziupForm->setBillingAddress(AddressMapper::create($jsonObject->billingAddress)->mapAddressFrom(new Address(), $jsonObject->billingAddress));
        }

        if (isset($jsonObject->paymentDetail)) {
            $iyziupForm->setPaymentDetail(PaymentResourceMapper::create($jsonObject->paymentDetail)->mapPaymentResourceFrom(new PaymentResource(), $jsonObject->paymentDetail));
        }

        return $iyziupForm;
    }

    public function mapIyziupForm(IyziupForm $iyziupForm)
    {
        return $this->mapIyziupFormFrom($iyziupForm, $this->jsonObject);
    }
}