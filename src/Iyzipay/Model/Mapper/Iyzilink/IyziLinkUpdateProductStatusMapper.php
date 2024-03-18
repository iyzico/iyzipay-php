<?php

namespace Iyzipay\Model\Mapper\Iyzilink;

use Iyzipay\Model\Mapper\IyzipayResourceMapper;
use Iyzipay\Model\Iyzilink\IyziLinkUpdateProductStatus;

class IyziLinkUpdateProductStatusMapper extends IyzipayResourceMapper {
    public static function create($rawResult = null): IyziLinkUpdateProductStatusMapper {
        return new IyziLinkUpdateProductStatusMapper($rawResult);
    }

    public function mapIyziLinkUpdateProductStatusFrom(IyziLinkUpdateProductStatus $iyziLinkUpdateProductStatus, $jsonObject): IyziLinkUpdateProductStatus {
        parent::mapResourceFrom($iyziLinkUpdateProductStatus, $jsonObject);

        if (isset($jsonObject->token)) {
            $iyziLinkUpdateProductStatus->setToken($jsonObject->token);
        }

        if (isset($jsonObject->productStatus)) {
            $iyziLinkUpdateProductStatus->setProductStatus($jsonObject->productStatus);
        }

        return $iyziLinkUpdateProductStatus;
    }

    public function mapIyziLinkUpdateProductStatus(IyziLinkUpdateProductStatus $iyziLinkUpdateProductStatus): IyziLinkUpdateProductStatus {
        return $this->mapIyziLinkUpdateProductStatusFrom($iyziLinkUpdateProductStatus, $this->jsonObject);
    }
}
