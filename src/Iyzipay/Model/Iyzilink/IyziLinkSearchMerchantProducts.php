<?php

namespace Iyzipay\Model\Iyzilink;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\Iyzilink\IyziLinkSearchMerchantProductsMapper;
use Iyzipay\Request\Iyzilink\IyziLinkSearchMerchantProductsRequest;
use Iyzipay\Options;
use Iyzipay\RequestStringBuilder;

class IyziLinkSearchMerchantProducts extends IyzipayResource {
    private int $page;
    private int $count;

    public function getPage(): int {
        return $this->page;
    }

    public function setPage(int $page): void {
        $this->page = $page;
    }

    public function getCount(): int {
        return $this->count;
    }

    public function setCount(int $count): void {
        $this->count = $count;
    }

    public static function create(IyziLinkSearchMerchantProductsRequest $request, Options $options): IyziLinkSearchMerchantProducts {
        $uri = $options->getBaseUrl() . "/v2/iyzilink/products" . RequestStringBuilder::requestToStringQuery($request, 'pages');
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options));
        return IyziLinkSearchMerchantProductsMapper::create($rawResult)->jsonDecode()->mapIyziLinkSearchMerchantProducts(new IyziLinkSearchMerchantProducts());
    }
}
