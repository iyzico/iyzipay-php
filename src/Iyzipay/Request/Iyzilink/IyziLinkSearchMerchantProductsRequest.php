<?php

namespace Iyzipay\Request\Iyzilink;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class IyziLinkSearchMerchantProductsRequest extends Request {
    private int $page;
    private int $count;

    public function getPage(): int {
        return $this->page;
    }

    public function setPage(int $page): void {
        $this->page = $page;
    }

    public function getCount(): int {
        return $this->count;
    }

    public function setCount(int $count): void {
        $this->count = $count;
    }

    public function getJsonObject() {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add('page', $this->getPage())
            ->add('count', $this->getCount())
            ->getObject();
    }

    public function toPKIRequestString(): RequestStringBuilder {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append('page', $this->getPage())
            ->append('count', $this->getCount())
            ->getRequestString();
    }
}
