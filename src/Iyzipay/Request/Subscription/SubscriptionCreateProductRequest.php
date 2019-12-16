<?php

namespace Iyzipay\Request\Subscription;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class SubscriptionCreateProductRequest extends Request
{
    private $name;
    private $description;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("name", $this->getName())
            ->add("description", $this->getDescription())
            ->add("locale", $this->getLocale())
            ->add("conversationId", $this->getConversationId())
            ->getObject();
    }
}