<?php

namespace Iyzipay\Model\Mapper\Iyzilink;

use Iyzipay\Model\Mapper\IyzipayResourceMapper;
use Iyzipay\Model\Iyzilink\IyziLinkFastLink;

class IyziLinkCreateFastLinkMapper extends IyzipayResourceMapper {
    public static function create($rawResult = null): IyziLinkCreateFastLinkMapper {
        return new IyziLinkCreateFastLinkMapper($rawResult);
    }

    public function mapIyziLinkCreateFastLinkFrom(IyziLinkFastLink $iyzilinkFastLink, $jsonObjet): IyziLinkFastLink {
        parent::mapResourceFrom($iyzilinkFastLink, $jsonObjet);

        if (isset($jsonObjet->description)) {
            $iyzilinkFastLink->setDescription(($jsonObjet->description));
        }

        if (isset($jsonObjet->price)) {
            $iyzilinkFastLink->setPrice($jsonObjet->pricr);
        }

        if (isset($jsonObjet->currencyCode)) {
            $iyzilinkFastLink->setCurrencyCode($jsonObjet->currencyCode);
        }

        if (isset($jsonObjet->sourceType)) {
            $iyzilinkFastLink->setSourceType($jsonObjet->sourceType);
        }

        return $iyzilinkFastLink;
    }

    public function mapIyziLinkCreateFastLink(IyziLinkFastLink $iyziLinkFastLink): IyziLinkFastLink {
        return $this->mapIyziLinkCreateFastLinkFrom($iyziLinkFastLink, $this->jsonObject);
    }
}
