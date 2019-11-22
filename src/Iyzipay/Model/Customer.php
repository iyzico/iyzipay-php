<?php

namespace Iyzipay\Model;

use Iyzipay\BaseModel;
use Iyzipay\JsonBuilder;
use Iyzipay\RequestStringBuilder;

class Customer extends BaseModel
{
    private $name;
    private $surname;
    private $identityNumber;
    private $email;
    private $gsmNumber;
    private $shippingAddressContactName;
    private $shippingAddressCity;
    private $shippingAddressCountry;
    private $shippingAddressAddress;
    private $shippingAddressZipCode;
    private $billingAddressContactName;
    private $billingAddressCity;
    private $billingAddressCountry;
    private $billingAddressAddress;
    private $billingAddressZipCode;


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getIdentityNumber()
    {
        return $this->identityNumber;
    }

    public function setIdentityNumber($identityNumber)
    {
        $this->identityNumber = $identityNumber;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getGsmNumber()
    {
        return $this->gsmNumber;
    }

    public function setGsmNumber($gsmNumber)
    {
        $this->gsmNumber = $gsmNumber;
    }

    public function getShippingAddressContactName(){

        return $this->shippingAddressContactName;
    }

    public function setShippingAddressContactName($shippingAddressContactName){

        return $this->shippingAddressContactName = $shippingAddressContactName;
    }

    public function getShippingAddressCity(){

        return $this->shippingAddressCity;
    }

    public function setShippingAddressCity($shippingAddressCity){

        return $this->shippingAddressCity = $shippingAddressCity;
    }

    public function getShippingAddressCountry(){

        return $this->shippingAddressCountry;
    }

    public function setShippingAddressCountry($shippingAddressCountry){

        return $this->shippingAddressCountry = $shippingAddressCountry;
    }

    public function getShippingAddressAddress(){

        return $this->shippingAddressAddress;
    }

    public function setShippingAddressAddress($shippingAddressAddress){

        return $this->shippingAddressAddress = $shippingAddressAddress;
    }

    public function getShippingAddressZipCode(){

        return $this->shippingAddressZipCode;
    }

    public function setShippingAddressZipCode($shippingAddressZipCode){

        return $this->shippingAddressZipCode = $shippingAddressZipCode;
    }

    public function getBillingAddressContactName(){

        return $this->billingAddressContactName;
    }

    public function setBillingAddressContactName($billingAddressContactName){

        return $this->billingAddressContactName = $billingAddressContactName;
    }

    public function getBillingAddressCity(){

        return $this->billingAddressCity;
    }

    public function setBillingAddressCity($billingAddressCity){

        return $this->billingAddressCity = $billingAddressCity;
    }

    public function getBillingAddressCountry(){

        return $this->billingAddressCountry;
    }

    public function setBillingAddressCountry($billingAddressCountry){

        return $this->billingAddressCountry = $billingAddressCountry;
    }

    public function getBillingAddressAddress(){

        return $this->billingAddressAddress;
    }

    public function setBillingAddressAddress($billingAddressAddress){

        return $this->billingAddressAddress = $billingAddressAddress;
    }

    public function getBillingAddressZipCode(){

        return $this->billingAddressZipCode;
    }

    public function setBillingAddressZipCode($billingAddressZipCode){

        return $this->billingAddressZipCode = $billingAddressZipCode;
    }



    public function getJsonObject($locale = null,$conversationId = null,$customerReferenceCode = null)
    {
        return JsonBuilder::create()
            ->add("locale", $locale)
            ->add("conversationId", $conversationId)
            ->add("customerReferenceCode", $customerReferenceCode)
            ->add("name", $this->getName())
            ->add("surname", $this->getSurname())
            ->add("identityNumber", $this->getIdentityNumber())
            ->add("email", $this->getEmail())
            ->add("gsmNumber", $this->getGsmNumber())
            ->add("billingAddress",
                JsonBuilder::create()
                    ->add("contactName", $this->getBillingAddressContactName())
                    ->add("city", $this->getBillingAddressCity())
                    ->add("country", $this->getBillingAddressCountry())
                    ->add("address", $this->getBillingAddressAddress())
                    ->add("zipCode", $this->getBillingAddressZipCode())
                    ->getObject()
            )
            ->add("shippingAddress",
                JsonBuilder::create()
                    ->add("contactName", $this->getShippingAddressContactName())
                    ->add("city", $this->getShippingAddressCity())
                    ->add("country", $this->getShippingAddressCountry())
                    ->add("address", $this->getShippingAddressAddress())
                    ->add("zipCode", $this->getShippingAddressZipCode())
                    ->getObject()
            )
            ->getObject();
    }

    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->append("name", $this->getName())
            ->append("surname", $this->getSurname())
            ->append("identityNumber", $this->getIdentityNumber())
            ->append("email", $this->getEmail())
            ->append("gsmNumber", $this->getGsmNumber())
            ->append("billingAddress",
                RequestStringBuilder::create()
                    ->append("contactName", $this->getBillingAddressContactName())
                    ->append("city", $this->getBillingAddressCity())
                    ->append("country", $this->getBillingAddressCountry())
                    ->append("address", $this->getBillingAddressAddress())
                    ->append("zipCode", $this->getBillingAddressZipCode())
                    ->getRequestString()
            )
            ->append("shippingAddress",
                RequestStringBuilder::create()
                    ->append("contactName", $this->getShippingAddressContactName())
                    ->append("city", $this->getShippingAddressCity())
                    ->append("country", $this->getShippingAddressCountry())
                    ->append("address", $this->getShippingAddressAddress())
                    ->append("zipCode", $this->getShippingAddressZipCode())
                    ->getRequestString()
            )
            ->getRequestString();
    }
}