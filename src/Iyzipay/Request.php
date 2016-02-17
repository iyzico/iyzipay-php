<?php

namespace Iyzipay;

class Request extends BaseModel
{
    private $locale;
    private $conversationId;

    public function getLocale()
    {
        return $this->locale;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    public function getConversationId()
    {
        return $this->conversationId;
    }

    public function setConversationId($conversationId)
    {
        $this->conversationId = $conversationId;
    }

    public function getJsonObject()
    {
        return JsonBuilder::create()
            ->add("locale", $this->getLocale())
            ->add("conversationId", $this->getConversationId())
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->append("locale", $this->getLocale())
            ->append("conversationId", $this->getConversationId())
            ->getRequestString();
    }
}