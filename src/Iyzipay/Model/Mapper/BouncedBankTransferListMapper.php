<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\BouncedBankTransferList;

class BouncedBankTransferListMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new BouncedBankTransferListMapper();
    }

    public function mapBouncedBankTransferList(BouncedBankTransferList $transferList, $jsonResult)
    {
        parent::mapResource($transferList, $jsonResult);

        if (isset($jsonResult->bouncedRows)) {
            $transferList->setBankTransfers($this->mapBankTransfers($jsonResult->bouncedRows));
        }
        return $transferList;
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