<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class RetrieveProtectedOverleyScriptRequest extends Request
{
    private $ideaSoft;
    private $position;

    public function getIdeaSoft()
    {
        return $this->ideaSoft;
    }

    public function setIdeaSoft($ideaSoft)
    {
        $this->ideaSoft = $ideaSoft;
    }
    
    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("ideaSoft", $this->getIdeaSoft())
            ->add("position", $this->getPosition())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append("ideaSoft", $this->getIdeaSoft())
            ->append("position", $this->getPosition())
            ->getRequestString();
    }
}