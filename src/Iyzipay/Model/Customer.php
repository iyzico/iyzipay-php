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
    private $shippingContactName;
    private $shippingCity;
    private $shippingDistrict;
    private $shippingCountry;
    private $shippingAddress;
    private $shippingZipCode;
    private $billingContactName;
    private $billingCity;
    private $billingDistrict;
    private $billingCountry;
    private $billingAddress;
    private $billingZipCode;

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

    public function getShippingContactName(){

        return $this->shippingContactName;
    }

    public function setShippingContactName($shippingContactName){

        return $this->shippingContactName = $shippingContactName;
    }

    public function getShippingCity(){

        return $this->shippingCity;
    }

    public function setShippingCity($shippingCity){

        return $this->shippingCity = $shippingCity;
    }

    public function getShippingCountry(){

        return $this->shippingCountry;
    }

    public function setShippingCountry($shippingCountry){

        return $this->shippingCountry = $shippingCountry;
    }

    public function getShippingAddress(){

        return $this->shippingAddress;
    }

    public function setShippingAddress($shippingAddress){

        return $this->shippingAddress = $shippingAddress;
    }

    public function getShippingZipCode(){

        return $this->shippingZipCode;
    }

    public function setShippingZipCode($shippingZipCode){

        return $this->shippingZipCode = $shippingZipCode;
    }

    public function getBillingContactName(){

        return $this->billingContactName;
    }

    public function setBillingContactName($billingContactName){

        return $this->billingContactName = $billingContactName;
    }

    public function getBillingCity(){

        return $this->billingCity;
    }

    public function setBillingCity($billingCity){

        return $this->billingCity = $billingCity;
    }

    public function getBillingCountry(){

        return $this->billingCountry;
    }

    public function setBillingCountry($billingCountry){

        return $this->billingCountry = $billingCountry;
    }

    public function getBillingAddress(){

        return $this->billingAddress;
    }

    public function setBillingAddress($billingAddress){

        return $this->billingAddress = $billingAddress;
    }

    public function getBillingZipCode(){

        return $this->billingZipCode;
    }

    public function setBillingZipCode($billingZipCode){

        return $this->billingZipCode = $billingZipCode;
    }

    public function getShippingDistrict()
    {
        return $this->shippingDistrict;
    }

    public function setShippingDistrict($shippingDistrict)
    {
        $this->shippingDistrict = $shippingDistrict;
    }

    public function getBillingDistrict()
    {
        return $this->billingDistrict;
    }

    public function setBillingDistrict($billingDistrict)
    {
        $this->billingDistrict = $billingDistrict;
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
                    ->add("contactName", $this->getBillingContactName())
                    ->add("city", $this->getBillingCity())
                    ->add("district", $this->getBillingDistrict())
                    ->add("country", $this->getBillingCountry())
                    ->add("address", $this->getBillingAddress())
                    ->add("zipCode", $this->getBillingZipCode())
                    ->getObject()
            )
            ->add("shippingAddress",
                JsonBuilder::create()
                    ->add("contactName", $this->getShippingContactName())
                    ->add("city", $this->getShippingCity())
                    ->add("district", $this->getShippingDistrict())
                    ->add("country", $this->getShippingCountry())
                    ->add("address", $this->getShippingAddress())
                    ->add("zipCode", $this->getShippingZipCode())
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
                    ->append("contactName", $this->getBillingContactName())
                    ->append("city", $this->getBillingCity())
                    ->append("district", $this->getBillingDistrict())
                    ->append("country", $this->getBillingCountry())
                    ->append("address", $this->getBillingAddress())
                    ->append("zipCode", $this->getBillingZipCode())
                    ->getRequestString()
            )
            ->append("shippingAddress",
                RequestStringBuilder::create()
                    ->append("contactName", $this->getShippingContactName())
                    ->append("city", $this->getShippingCity())
                    ->append("district", $this->getShippingDistrict())
                    ->append("country", $this->getShippingCountry())
                    ->append("address", $this->getShippingAddress())
                    ->append("zipCode", $this->getShippingZipCode())
                    ->getRequestString()
            )
            ->getRequestString();
    }
}