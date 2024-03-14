<?php

namespace Iyzipay\Model\Iyzilink;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\Iyzilink\IyziLinkCreateFastLinkMapper;
use Iyzipay\Request\Iyzilink\IyziLinkCreateFastLinkRequest;
use Iyzipay\Options;
use Iyzipay\RequestStringBuilder;

class IyziLinkFastLink extends IyzipayResource {
    private string $description;
    private $price;
    private string $currencyCode;
    private string $sourceType;

    public static function create(IyziLinkCreateFastLinkRequest $request, Options $options): IyziLinkFastLink {
        $uri = $options->getBaseUrl() . "/v2/iyzilink/fast-link/products" . RequestStringBuilder::requestToStringQuery($request, 'locale');
        $rawResult = parent::httpClient()->post($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return IyziLinkCreateFastLinkMapper::create($rawResult)->jsonDecode()->mapIyziLinkCreateFastLink(new IyziLinkFastLink());
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price): void {
        $this->price = $price;
    }

    public function getCurrencyCode(): string {
        return $this->currencyCode;
    }

    public function setCurrencyCode(string $currencyCode): void {
        $this->currencyCode = $currencyCode;
    }

    public function getSourceType(): string {
        return $this->sourceType;
    }

    public function setSourceType(string $sourceType): void {
        $this->sourceType = $sourceType;
    }
}
