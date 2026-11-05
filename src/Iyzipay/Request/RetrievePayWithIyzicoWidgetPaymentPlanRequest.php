<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class RetrievePayWithIyzicoWidgetPaymentPlanRequest extends Request
{
    private $widgetToken;

    public function getWidgetToken()
    {
        return $this->widgetToken;
    }

    public function setWidgetToken($widgetToken)
    {
        $this->widgetToken = $widgetToken;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("widgetToken", $this->getWidgetToken())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("widgetToken", $this->getWidgetToken())
            ->getRequestString();
    }
}
