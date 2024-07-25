<?php

namespace Iyzipay\Model;

use Iyzipay\Options;
use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\C2CSubMerchantMapper;
use Iyzipay\Request\CreateC2CSubMerchantRequest;
use Iyzipay\Request\VerifyC2CSubMerchantRequest;

class C2CSubMerchant extends IyzipayResource {
    private string $name;
    private string $surname;
    private string $email;
    private string $gsmNumber;
    private string $tckNo;
    private string $birthDate;
    private string $address;
    private string $externalId;

    private string $txId;
    private string $smsVerificationCode;

    private static function mappedResult(string $rawResult): C2CSubMerchant {
        return C2CSubMerchantMapper::create($rawResult)->jsonDecode()->mapC2CSubMerchant(new C2CSubMerchant());
    }

    public static function create(CreateC2CSubMerchantRequest $request, Options $options): C2CSubMerchant {
        $url = '/onboarding/settlement-to-balance/submerchant';
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return self::mappedResult($rawResult);
    }

    public static function verify(VerifyC2CSubMerchantRequest $request, Options $options): C2CSubMerchant {
        $url = '/onboarding/settlement-to-balance/submerchant/verify';
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return self::mappedResult($rawResult);
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getSurname(): string {
        return $this->surname;
    }

    public function setSurname(string $surname): void {
        $this->surname = $surname;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getGsmNumber(): string {
        return $this->gsmNumber;
    }

    public function setGsmNumber(string $gsmNumber): void {
        $this->gsmNumber = $gsmNumber;
    }

    public function getTckNo(): string {
        return $this->tckNo;
    }

    public function setTckNo(string $tckNo): void {
        $this->tckNo = $tckNo;
    }

    public function getBirthDate(): string {
        return $this->birthDate;
    }

    public function setBirthDate(string $birthDate): void {
        $this->birthDate = $birthDate;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function setAddress(string $address): void {
        $this->address = $address;
    }

    public function getExternalId(): string {
        return $this->externalId;
    }

    public function setExternalId(string $externalId): void {
        $this->externalId = $externalId;
    }

    public function getTxId(): string {
        return $this->txId;
    }

    public function setTxId(string $txId): void {
        $this->txId = $txId;
    }

    public function getSmsVerificationCode(): string {
        return $this->smsVerificationCode;
    }

    public function setSmsVerificationCode(string $smsVerificationCode): void {
        $this->smsVerificationCode = $smsVerificationCode;
    }
}
