<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\BlacklistedCardMapper;
use Iyzipay\Request\CreateBlackListedCardRequest;
use Iyzipay\Request\RetrieveBlacklistedCardRequest;
use Iyzipay\Request\UpdateBlackListedCardRequest;
use Iyzipay\Options;

class BlacklistedCard extends IyzipayResource {
    private string $cardUserKey;
    private string $cardToken;
    private string $cardNumber;
    const URL = '/cardstorage/blacklist/card';

    public static function create(CreateBlackListedCardRequest $request, Options $options): BlacklistedCard {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . self::URL, parent::getHttpHeadersV2(self::URL, $request, $options), $request->toJsonString());
        return BlacklistedCardMapper::create($rawResult)->jsonDecode()->mapBlacklistedCard(new BlacklistedCard());
    }

    public static function retrieve(RetrieveBlacklistedCardRequest $request, Options $options): BlacklistedCard {
        $url = self::URL . '/retrieve';
        $rawResult = parent::httpClient()->post(($options)->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return BlacklistedCardMapper::create($rawResult)->jsonDecode()->mapRetrieveBlacklistedCard(new BlacklistedCard());
    }

    public static function update(UpdateBlackListedCardRequest $request, Options $options): BlacklistedCard {
        $url = self::URL . '/inactive';
        $rawResult = parent::httpClient()->post(($options)->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return BlacklistedCardMapper::create($rawResult)->jsonDecode()->mapBlacklistedCard(new BlacklistedCard());
    }

    public function getCardUserKey(): string {
        return $this->cardUserKey;
    }

    public function setCardUserKey($cardUserKey): void {
        $this->cardUserKey = $cardUserKey;
    }

    public function getCardToken(): string {
        return $this->cardToken;
    }

    public function setCardToken($cardToken): void {
        $this->cardToken = $cardToken;
    }

    public function getCardNumber(): string {
        return $this->cardNumber;
    }

    public function setCardNumber(string $cardNumber): void {
        $this->cardNumber = $cardNumber;
    }
}