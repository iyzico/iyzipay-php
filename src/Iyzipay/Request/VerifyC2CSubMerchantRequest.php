<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;
use Iyzipay\RequestStringBuilder;

class VerifyC2CSubMerchantRequest extends Request {
    private string $txId;
    private string $smsVerificationCode;

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

    public function getJsonObject(): array {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add('txId', $this->getTxId())
            ->add('smsVerificationCode', $this->getSmsVerificationCode())
            ->getObject();
    }

    public function toPKIRequestString(): string {
        return RequestStringBuilder::create()
            ->appendSuper(parent::toPKIRequestString())
            ->append('txId', $this->getTxId())
            ->append('smsVerificationCode', $this->getSmsVerificationCode())
            ->getRequestString();
    }
}