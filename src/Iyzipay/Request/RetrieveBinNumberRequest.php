<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class RetrieveBinNumberRequest extends Request
{
    private $binNumber;

    public function getBinNumber()
    {
        return $this->binNumber;
    }

    public function setBinNumber($binNumber)
    {
        $this->binNumber = $binNumber;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("binNumber", $this->getBinNumber())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("binNumber", $this->getBinNumber())
            ->getRequestString();
    }
}