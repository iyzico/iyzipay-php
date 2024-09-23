<?php

namespace Iyzipay\Model\Mapper\Iyzilink;

use Iyzipay\Model\Mapper\IyzipayResourceMapper;
use Iyzipay\Model\Iyzilink\IyziLinkSearchMerchantProducts;

class IyziLinkSearchMerchantProductsMapper extends IyzipayResourceMapper {
    public static function create($rawResult = null): IyziLinkSearchMerchantProductsMapper {
        return new IyziLinkSearchMerchantProductsMapper($rawResult);
    }

    public function mapIyziLinkSearchMerchantProductsFrom(IyziLinkSearchMerchantProducts $iyziLinkSearchMerchantProducts, object $jsonObject): IyziLinkSearchMerchantProducts {
        parent::mapResourceFrom($iyziLinkSearchMerchantProducts, $jsonObject);

        if (isset($jsonObject->page)) {
            $iyziLinkSearchMerchantProducts->setPage($jsonObject->page);
        }

        if (isset($jsonObject->count)) {
            $iyziLinkSearchMerchantProducts->setCount($jsonObject->count);
        }

        return $iyziLinkSearchMerchantProducts;
    }

    public function mapIyziLinkSearchMerchantProducts(IyziLinkSearchMerchantProducts $iyziLinkSearchMerchantProducts): IyziLinkSearchMerchantProducts {
        return $this->mapIyziLinkSearchMerchantProductsFrom($iyziLinkSearchMerchantProducts, $this->jsonObject);
    }
}
