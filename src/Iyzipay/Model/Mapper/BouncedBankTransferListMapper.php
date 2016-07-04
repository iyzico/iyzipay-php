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

            if (isset($bouncedRow->subMerchantKey)) {
                $bankTransfer->setSubMerchantKey($bouncedRow->subMerchantKey);
            }
            if (isset($bouncedRow->iban)) {
                $bankTransfer->setIban($bouncedRow->iban);
            }
            if (isset($bouncedRow->contactName)) {
                $bankTransfer->setContactName($bouncedRow->contactName);
            }
            if (isset($bouncedRow->contactSurname)) {
                $bankTransfer->setContactSurname($bouncedRow->contactSurname);
            }
            if (isset($bouncedRow->legalCompanyTitle)) {
                $bankTransfer->setLegalCompanyTitle($bouncedRow->legalCompanyTitle);
            }
            if (isset($bouncedRow->marketplaceSubmerchantType)) {
                $bankTransfer->setMarketplaceSubMerchantType($bouncedRow->marketplaceSubmerchantType);
            }
            $bankTransfers[$index] = $bankTransfer;
        }
        return $bankTransfers;
    }
}