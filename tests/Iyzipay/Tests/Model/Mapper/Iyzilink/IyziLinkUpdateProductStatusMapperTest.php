<?php

namespace Iyzipay\Tests\Model\Mapper\Iyzilink;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Status;
use Iyzipay\Model\Iyzilink\IyziLinkUpdateProductStatus;
use Iyzipay\Model\Mapper\Iyzilink\IyziLinkUpdateProductStatusMapper;
use Iyzipay\Tests\TestCase;

class IyziLinkUpdateProductStatusMapperTest extends TestCase {
    public function testShouldMapIyziLinkUpdateProductStatusCreate(): void {
        $json = $this->retrieveJsonFile("iyzilink-update-product-status.json");
        $iyziLinkUpdateProductStatus = IyziLinkUpdateProductStatusMapper::create($json)->jsonDecode()->mapIyziLinkUpdateProductStatus(new IyziLinkUpdateProductStatus());

        $this->assertNotEmpty($iyziLinkUpdateProductStatus);
        $this->assertEquals(Status::SUCCESS, $iyziLinkUpdateProductStatus->getStatus());
        $this->assertEquals(Locale::TR, $iyziLinkUpdateProductStatus->getLocale());
        $this->assertEquals(1710349430773, $iyziLinkUpdateProductStatus->getSystemTime());
    }
}
