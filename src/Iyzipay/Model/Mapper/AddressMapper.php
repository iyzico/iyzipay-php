<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Address;

class AddressMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new AddressMapper($rawResult);
    }

    public function mapAddressFrom(Address $address, $jsonObject)
    {
        if (isset($jsonObject->address)) {
            $address->setAddress($jsonObject->address);
        }
        if (isset($jsonObject->zipCode)) {
            $address->setZipCode($jsonObject->zipCode);
        }
        if (isset($jsonObject->contactName)) {
            $address->setContactName($jsonObject->contactName);
        }
        if (isset($jsonObject->city)) {
            $address->setCity($jsonObject->city);
        }
        if (isset($jsonObject->country)) {
            $address->setCountry($jsonObject->country);
        }
        return $address;
    }
}