<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Consumer;

class ConsumerMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ConsumerMapper($rawResult);
    }

    public function mapConsumerFrom(Consumer $consumer, $jsonObject)
    {
        if (isset($jsonObject->name)) {
            $consumer->setName($jsonObject->name);
        }
        if (isset($jsonObject->surname)) {
            $consumer->setSurname($jsonObject->surname);
        }
        if (isset($jsonObject->identityNumber)) {
            $consumer->setIdentityNumber($jsonObject->identityNumber);
        }
        if (isset($jsonObject->email)) {
            $consumer->setEmail($jsonObject->email);
        }
        if (isset($jsonObject->gsmNumber)) {
            $consumer->setGsmNumber($jsonObject->gsmNumber);
        }
        return $consumer;
    }
}