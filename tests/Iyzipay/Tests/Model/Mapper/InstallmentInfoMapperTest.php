<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\InstallmentInfo;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\InstallmentInfoMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class InstallmentInfoMapperTest extends TestCase
{
    public function test_should_map_installment_info()
    {
        $json = $this->retrieveJsonFile("retrieve-installment-info.json");

        $installmentInfo = InstallmentInfoMapper::create($json)->jsonDecode()->mapInstallmentInfo(new InstallmentInfo());

        $this->assertNotEmpty($installmentInfo);
        $this->assertEquals(Status::FAILURE, $installmentInfo->getStatus());
        $this->assertEquals("10000", $installmentInfo->getErrorCode());
        $this->assertEquals("error message", $installmentInfo->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $installmentInfo->getErrorGroup());
        $this->assertEquals(Locale::TR, $installmentInfo->getLocale());
        $this->assertEquals("1458545234852", $installmentInfo->getSystemTime());
        $this->assertEquals("123456", $installmentInfo->getConversationId());
        $this->assertJson($installmentInfo->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $installmentInfo->getRawResult());

        $installmentDetails = $installmentInfo->getInstallmentDetails();
        $this->assertNotEmpty($installmentDetails);
        $this->assertEquals(2, count($installmentDetails));

        $installmentDetail = $installmentDetails[0];
        $this->assertEquals("554960", $installmentDetail->getBinNumber());
        $this->assertEquals("100.0", $installmentDetail->getPrice());
        $this->assertEquals("CREDIT_CARD", $installmentDetail->getCardType());
        $this->assertEquals("MASTER_CARD", $installmentDetail->getCardAssociation());
        $this->assertEquals("Bonus", $installmentDetail->getCardFamilyName());
        $this->assertEquals("0", $installmentDetail->getForce3ds());
        $this->assertEquals("10", $installmentDetail->getBankCode());
        $this->assertEquals("Ziraat Bankası", $installmentDetail->getBankName());
        $this->assertEquals("1", $installmentDetail->getForceCvc());
        $this->assertEquals("0", $installmentDetail->getCommercial());


        $installmentPrices = $installmentDetail->getInstallmentPrices();
        $this->assertNotEmpty($installmentPrices);
        $this->assertEquals(3, count($installmentPrices));

        $installmentPrice = $installmentPrices[0];
        $this->assertEquals("100.0", $installmentPrice->getInstallmentPrice());
        $this->assertEquals("100.0", $installmentPrice->getTotalPrice());
        $this->assertEquals("1", $installmentPrice->getInstallmentNumber());

        $installmentPrice2 = $installmentPrices[1];
        $this->assertEquals("50.68", $installmentPrice2->getInstallmentPrice());
        $this->assertEquals("101.36", $installmentPrice2->getTotalPrice());
        $this->assertEquals("2", $installmentPrice2->getInstallmentNumber());

        $installmentPrice3 = $installmentPrices[2];
        $this->assertEquals("33.95", $installmentPrice3->getInstallmentPrice());
        $this->assertEquals("101.86", $installmentPrice3->getTotalPrice());
        $this->assertEquals("3", $installmentPrice3->getInstallmentNumber());

        $installmentDetail2 = $installmentDetails[1];
        $this->assertEquals("554961", $installmentDetail2->getBinNumber());
        $this->assertEquals("100.0", $installmentDetail2->getPrice());
        $this->assertEquals("DEBIT_CARD", $installmentDetail2->getCardType());
        $this->assertEquals("VISA", $installmentDetail2->getCardAssociation());
        $this->assertEquals("Maximum", $installmentDetail2->getCardFamilyName());
        $this->assertEquals("1", $installmentDetail2->getForce3ds());
        $this->assertEquals("11", $installmentDetail2->getBankCode());
        $this->assertEquals("Garanti Bankası", $installmentDetail2->getBankName());
        $this->assertEquals("0", $installmentDetail2->getForceCvc());
        $this->assertEquals("1", $installmentDetail2->getCommercial());


        $installmentPrices2 = $installmentDetail2->getInstallmentPrices();
        $this->assertNotEmpty($installmentPrices2);
        $this->assertEquals(3, count($installmentPrices2));

        $installmentPrice4 = $installmentPrices2[0];
        $this->assertEquals("100.0", $installmentPrice4->getInstallmentPrice());
        $this->assertEquals("100.0", $installmentPrice4->getTotalPrice());
        $this->assertEquals("1", $installmentPrice4->getInstallmentNumber());

        $installmentPrice5 = $installmentPrices2[1];
        $this->assertEquals("50.62", $installmentPrice5->getInstallmentPrice());
        $this->assertEquals("102.23", $installmentPrice5->getTotalPrice());
        $this->assertEquals("2", $installmentPrice5->getInstallmentNumber());

        $installmentPrice6 = $installmentPrices2[2];
        $this->assertEquals("34.10", $installmentPrice6->getInstallmentPrice());
        $this->assertEquals("102.30", $installmentPrice6->getTotalPrice());
        $this->assertEquals("3", $installmentPrice6->getInstallmentNumber());
    }
}