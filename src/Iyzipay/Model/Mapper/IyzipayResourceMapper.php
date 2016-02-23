<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\IyzipayResource;

class IyzipayResourceMapper
{
    public static function create()
    {
        return new IyzipayResourceMapper();
    }

    public function mapResource(IyzipayResource $resource, $jsonResult)
    {
        if (isset($jsonResult->status)) {
            $resource->setStatus($jsonResult->status);
        }
        if (isset($jsonResult->conversationId)) {
            $resource->setConversationId($jsonResult->conversationId);
        }
        if (isset($jsonResult->errorCode)) {
            $resource->setErrorCode($jsonResult->errorCode);
        }
        if (isset($jsonResult->errorMessage)) {
            $resource->setErrorMessage($jsonResult->errorMessage);
        }
        if (isset($jsonResult->errorGroup)) {
            $resource->setErrorGroup($jsonResult->errorGroup);
        }
        if (isset($jsonResult->locale)) {
            $resource->setLocale($jsonResult->locale);
        }
        if (isset($jsonResult->systemTime)) {
            $resource->setSystemTime($jsonResult->systemTime);
        }
        return $resource;
    }
}