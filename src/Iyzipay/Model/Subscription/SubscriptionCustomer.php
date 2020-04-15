<?php

namespace Iyzipay\Model\Subscription;

use Iyzipay\Options;
use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\Subscription\SubscriptionCustomerMapper;
use Iyzipay\Request\Subscription\SubscriptionCreateCustomerRequest;
use Iyzipay\Request\Subscription\SubscriptionUpdateCustomerRequest;
use Iyzipay\Request\Subscription\SubscriptionRetrieveCustomerRequest;
use Iyzipay\RequestStringBuilder;

class SubscriptionCustomer extends IyzipayResource
{

    private $referenceCode;
    private $name;
    private $surname;
    private $identityNumber;
    private $email;
    private $gsmNumber;
    private $contactEmail;
    private $contactGsmNumber;
    private $customerStatus;
    private $createdDate;
    private $billingCity;
    private $billingDistrict;
    private $billingCountry;
    private $billingZipCode;
    private $billingAddress;
    private $billingContactName;
    private $shippingCity;
    private $shippingDistrict;
    private $shippingCountry;
    private $shippingZipCode;
    private $shippingAddress;
    private $shippingContactName;

    public static function create(SubscriptionCreateCustomerRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/customers";
        $rawResult = parent::httpClient()->post($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return SubscriptionCustomerMapper::create($rawResult)->jsonDecode()->mapSubscriptionCustomer(new SubscriptionCustomer());
    }

    public static function retrieve(SubscriptionRetrieveCustomerRequest $request, $options)
    {
        $uri = $options->getBaseUrl() . "/v2/subscription/customers/".$request->getCustomerReferenceCode().RequestStringBuilder::requestToStringQuery($request, 'defaultParams');
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options), $request->toJsonString());
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

    public function getBillingDistrict()
    {
        return $this->billingDistrict;
    }

    public function setBillingDistrict($billingDistrict)
    {
        $this->billingDistrict = $billingDistrict;
    }

    public function getShippingDistrict()
    {
        return $this->shippingDistrict;
    }

    public function setShippingDistrict($shippingDistrict)
    {
        $this->shippingDistrict = $shippingDistrict;
    }

    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
    }
    public function getContactGsmNumber()
    {
        return $this->contactGsmNumber;
    }
    public function setContactGsmNumber($contactGsmNumber)
    {
        $this->contactGsmNumber = $contactGsmNumber;
    }
}
