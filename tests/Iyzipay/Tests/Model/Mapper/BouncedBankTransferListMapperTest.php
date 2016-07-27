<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\BouncedBankTransferList;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\BouncedBankTransferListMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class BouncedBankTransferListMapperTest extends TestCase
{
    public function test_should_map_bounced_bank_transfer_list()
    {
        $json = $this->retrieveJsonFile("retrieve-bounced-bank-transfers.json");

        $bouncedBankTransferList = BouncedBankTransferListMapper::create($json)->jsonDecode()->mapBouncedBankTransferList(new BouncedBankTransferList());

        $this->assertNotEmpty($bouncedBankTransferList);
        $this->assertEquals(Status::FAILURE, $bouncedBankTransferList->getStatus());
        $this->assertEquals("10000", $bouncedBankTransferList->getErrorCode());
        $this->assertEquals("error message", $bouncedBankTransferList->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $bouncedBankTransferList->getErrorGroup());
        $this->assertEquals(Locale::TR, $bouncedBankTransferList->getLocale());
        $this->assertEquals("1458545234852", $bouncedBankTransferList->getSystemTime());
        $this->assertEquals("123456", $bouncedBankTransferList->getConversationId());
        $this->assertJson($bouncedBankTransferList->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $bouncedBankTransferList->getRawResult());

        $bankTransfers = $bouncedBankTransferList->getBankTransfers();
        $this->assertNotEmpty($bankTransfers);
        $this->assertEquals(2, count($bankTransfers));

        $bankTransfer = $bankTransfers[0];
        $this->assertEquals("subMerchantKey", $bankTransfer->getSubMerchantKey());
        $this->assertEquals("TR12121212", $bankTransfer->getIban());
        $this->assertEquals("John", $bankTransfer->getContactName());
        $this->assertEquals("Doe", $bankTransfer->getContactSurname());
        $this->assertEquals("abc inc", $bankTransfer->getLegalCompanyTitle());
        $this->assertEquals("PERSONAL", $bankTransfer->getMarketplaceSubMerchantType());

        $bankTransfer2 = $bankTransfers[1];
        $this->assertEquals("subMerchantKey", $bankTransfer2->getSubMerchantKey());
        $this->assertEquals("TR1212121232", $bankTransfer2->getIban());
        $this->assertEquals("John2", $bankTransfer2->getContactName());
        $this->assertEquals("Doe2", $bankTransfer2->getContactSurname());
        $this->assertEquals("xyz inc", $bankTransfer2->getLegalCompanyTitle());
        $this->assertEquals("PRIVATE_COMPANY", $bankTransfer2->getMarketplaceSubMerchantType());
    }
}