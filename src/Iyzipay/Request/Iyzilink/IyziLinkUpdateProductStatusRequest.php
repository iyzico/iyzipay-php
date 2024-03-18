<?php

namespace Iyzipay\Request\Iyzilink;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class IyziLinkUpdateProductStatusRequest extends Request {
    private string $token;
    private string $productStatus;

    public function getToken(): string {
        return $this->token;
    }

    public function setToken(string $token): void {
        $this->token = $token;
    }

    public function getProductStatus(): string {
        return $this->productStatus;
    }

    public function setProductStatus(string $productStatus): void {
        $this->productStatus = $productStatus;
    }

    public function getJsonObject() {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add('token', $this->getToken())
            ->add('productStatus', $this->getProductStatus())
            ->getObject();
    }
}