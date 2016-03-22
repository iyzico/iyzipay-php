<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BankTransfer;
use Iyzipay\Model\BouncedBankTransferList;

class BouncedBankTransferListMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new BouncedBankTransferListMapper($rawResult);
    }

    public function mapBouncedBankTransferListFrom(BouncedBankTransferList $transferList, $jsonObject)
    {
        parent::mapResourceFrom($transferList, $jsonObject);

        if (isset($jsonObject->bouncedRows)) {
            $transferList->setBankTransfers($this->mapBankTransfers($jsonObject->bouncedRows));
        }
        return $transferList;
    }

    public function mapBouncedBankTransferList(BouncedBankTransferList $transferList)
    {
        return $this->mapBouncedBankTransferListFrom($transferList, $this->jsonObject);
    }

    private function mapBankTransfers($bouncedRows)
    {
        $bankTransfers = array();

        foreach ($bouncedRows as $index => $bouncedRow) {
            $bankTransfer = new BankTransfer();

            if (isset($bouncedRows->subMerchantKey)) {
                $bankTransfer->setSubMerchantKey($bouncedRow->submerchantKey);
            }
            if (isset($bouncedRows->iban)) {
                $bankTransfer->setIban($bouncedRow->iban);
            }
            if (isset($bouncedRows->contactName)) {
                $bankTransfer->setContactName($bouncedRow->contactName);
            }
            if (isset($bouncedRows->contactSurname)) {
                $bankTransfer->setContactSurname($bouncedRow->contactSurname);
            }
            if (isset($bouncedRows->legalCompanyTitle)) {
                $bankTransfer->setLegalCompanyTitle($bouncedRow->legalCompanyTitle);
            }
            if (isset($bouncedRows->marketplaceSubmerchantType)) {
                $bankTransfer->setMarketplaceSubMerchantType($bouncedRow->marketplaceSubmerchantType);
            }
            $bankTransfers[$index] = $bankTransfer;
        }
        return $bankTransfers;
    }
}