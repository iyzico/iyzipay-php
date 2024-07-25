<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BlacklistedCard;

class BlacklistedCardMapper extends IyzipayResourceMapper {
    public static function create($rawResult = null): BlacklistedCardMapper {
        return new BlacklistedCardMapper($rawResult);
    }

    public function mapBlacklistedCardForm(BlacklistedCard $blacklistedCard, $jsonObject): BlacklistedCard {
        parent::mapResourceFrom($blacklistedCard, $jsonObject);

        if (isset($jsonObject->cardUserKey)) {
            $blacklistedCard->setCardUserKey($jsonObject->cardUserKey);
        }
        if (isset($jsonObject->cardToken)) {
            $blacklistedCard->setCardToken($jsonObject->cardToken);
        }

        return $blacklistedCard;
    }

    public function mapRetrieveBlacklistedCardForm(BlacklistedCard $blacklistedCard, $jsonObject): BlacklistedCard {
        parent::mapResourceFrom($blacklistedCard, $jsonObject);

        if (isset($jsonObject->cardNumber)) {
            $blacklistedCard->setCardNumber(($jsonObject->cardNumber));
        }
        return $blacklistedCard;
    }

    public function mapBlacklistedCard(BlacklistedCard $blacklistedCard): BlacklistedCard {
        return $this->mapBlacklistedCardForm($blacklistedCard, $this->jsonObject);
    }

    public function mapRetrieveBlacklistedCard(BlacklistedCard $blacklistedCard): BlacklistedCard {
        return $this->mapRetrieveBlacklistedCardForm($blacklistedCard, $this->jsonObject);
    }
}
