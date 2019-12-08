<?php

namespace Iyzipay\Model\Subscription;

use Iyzipay\Options;
use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\Subscription\SubscriptionCustomerMapper;
use Iyzipay\Request\Subscription\SubscriptionCreateCustomerRequest;
use Iyzipay\Request\Subscription\SubscriptionUpdateCustomerRequest;
use Iyzipay\Request\Subscription\SubscriptionRetrieveCustomerRequest;

class SubscriptionCustomer extends IyzipayResource
{

    private $referenceCode;
    private $name;
    private $surname;
    private $identityNumber;
    private $email;
    private $gsmNumber;
    private $customerStatus;
    private $createdDate;
    private $billingAddressCity;
    private $billingAddressCountry;
    private $billingAddressZipCode;
    private $billingAddressAddress;
    private $billingAddressContactName;
    private $shippingAddressCity;
    private $shippingAddressCountry;
    private $shippingAddressZipCode;
    private $shippingAddressAddress;
    private $shippingAddressContactName;

    public static function create(SubscriptionCreateCustomerRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/customers";
        $rawResult = parent::httpClient()->post($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return SubscriptionCustomerMapper::create($rawResult)->jsonDecode()->mapSubscriptionCustomer(new SubscriptionCustomer());
    }

    public static function retrieve(SubscriptionRetrieveCustomerRequest $request, $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/customers/".$request->getCustomerReferenceCode();
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return SubscriptionCustomerMapper::create($rawResult)->jsonDecode()->mapSubscriptionCustomer(new SubscriptionCustomer());
    }

    public static function update(SubscriptionUpdateCustomerRequest $request, $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/customers/".$request->getCustomerReferenceCode();
        $rawResult = parent::httpClient()->post($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return SubscriptionCustomerMapper::create($rawResult)->jsonDecode()->mapSubscriptionCustomer(new SubscriptionCustomer());
    }

    public function setReferenceCode($referenceCode)
    {
        $this->referenceCode = $referenceCode;
    }

    public function getReferenceCode()
    {
        return $this->referenceCode;
    }
    public function setCustomerStatus($customerStatus)
    {
        $this->customerStatus = $customerStatus;
    }

    public function getCustomerStatus()
    {
        return $this->customerStatus;
    }

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

    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
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
}
