<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PlusInstallmentPaymentResource;

class PlusInstallmentPaymentResourceMapper extends IyzipayResourceMapper {
    public static function create($rawResult = null): PlusInstallmentPaymentResourceMapper {
        return new PlusInstallmentPaymentResourceMapper($rawResult);
    }

    public function mapPlusInstallmentPaymentResourceFrom(PlusInstallmentPaymentResource $resource, object $jsonObject): PlusInstallmentPaymentResource {
        parent::mapResourceFrom($resource, $jsonObject);

        if (isset($jsonObject->price)) {
            $resource->setPrice($jsonObject->price);
        }

        if (isset($jsonObject->paidPrice)) {
            $resource->setPaidPrice($jsonObject->paidPrice);
        }

        if (isset($jsonObject->currency)) {
            $resource->setCurrency($jsonObject->currency);
        }

        if (isset($jsonObject->installment)) {
            $resource->setInstallment($jsonObject->installment);
        }

        if (isset($jsonObject->paymentChannel)) {
            $resource->setPaymentChannel($jsonObject->paymentChannel);
        }

        if (isset($jsonObject->basketId)) {
            $resource->setBasketId($jsonObject->basketId);
        }

        if (isset($jsonObject->paymentGroup)) {
            $resource->setPaymentGroup($jsonObject->paymentGroup);
        }

//        if (isset($jsonObject->connectorName)) {
//            $resource->setConnectorName($jsonObject->connectorName);
//        }
//
//        if (isset($jsonObject->plusInstallmentUsage)) {
//            $resource->setPlusInstallmentUsage($jsonObject->plusInstallmentUsage);
//        }

        if (isset($jsonObject->paymentCard)) {
            $resource->setPaymentCard($jsonObject->paymentCard);
        }

        if (isset($jsonObject->buyer)) {
            $resource->setBuyer($jsonObject->buyer);
        }

        if (isset($jsonObject->shippingAddress)) {
            $resource->setShippingAddress($jsonObject->shippingAddress);
        }

        if (isset($jsonObject->billingAddress)) {
            $resource->setBillingAddress($jsonObject->billingAddress);
        }

        if (isset($jsonObject->basketItems)) {
            $resource->setBasketItems($jsonObject->basketItems);
        }

        return $resource;
    }

    public function mapPlusInstallmentPaymentResource(PlusInstallmentPaymentResource $resource): PlusInstallmentPaymentResource {
        return $this->mapPlusInstallmentPaymentResourceFrom($resource, $this->jsonObject);
    }
}
