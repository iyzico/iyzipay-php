<?php

namespace Iyzipay\Model\Iyzilink;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\Iyzilink\IyziLinkUpdateProductStatusMapper;
use Iyzipay\Request\Iyzilink\IyziLinkUpdateProductStatusRequest;
use Iyzipay\Options;
use Iyzipay\RequestStringBuilder;

class IyziLinkUpdateProductStatus extends IyzipayResource {
    private string $token;
    private string $productStatus;

    public function getToken(): string {
        return $this->token;
    }

    public function setToken(string $token): void {
        $this->token = $token;
    }

    public function getProductStatus(): string {
        return $this->productStatus;
    }

    public function setProductStatus(string $productStatus): void {
        $this->productStatus = $productStatus;
    }

    public static function create(IyziLinkUpdateProductStatusRequest $request, Options $options) {
        $token = $request->getToken();
        $productStatus = $request->getProductStatus();
        $uri = $options->getBaseUrl() . "/v2/iyzilink/products/$token/status/$productStatus" . RequestStringBuilder::requestToStringQuery($request, 'locale');
        $rawResult = parent::httpClient()->patch($uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return IyziLinkUpdateProductStatusMapper::create($rawResult)->jsonDecode()->mapIyziLinkUpdateProductStatus(new IyziLinkUpdateProductStatus());
    }
}
