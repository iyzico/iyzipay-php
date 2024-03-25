<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class CreateC2CSubMerchantRequest extends Request {
    private string $name;
    private string $surname;
    private string $email;
    private string $gsmNumber;
    private string $tckNo;
    private string $birthDate;
    private string $address;
    private string $externalId;

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

    public function getJsonObject(): array {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add('name', $this->getName())
            ->add('surname', $this->getSurname())
            ->add('email', $this->getEmail())
            ->add('gsmNumber', $this->getGsmNumber())
            ->add('tckNo', $this->getTckNo())
            ->add('birthDate', $this->getBirthDate())
            ->add('address', $this->getAddress())
            ->add('externalId', $this->getExternalId())
            ->getObject();
    }

    public function toPKIRequestString(): string {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append('name', $this->getName())
            ->append('surname', $this->getSurname())
            ->append('email', $this->getEmail())
            ->append('gsmNumber', $this->getGsmNumber())
            ->append('tckNo', $this->getTckNo())
            ->append('birthDate', $this->getBirthDate())
            ->append('address', $this->getAddress())
            ->append('externalId', $this->getExternalId())
            ->getRequestString();
    }
}
