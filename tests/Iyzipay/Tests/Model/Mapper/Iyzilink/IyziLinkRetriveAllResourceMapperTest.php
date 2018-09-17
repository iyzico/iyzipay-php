<?php

namespace Iyzipay\Tests\Model\Mapper\Iyzilink;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\Iyzilink\IyziLinkRetriveAllProductResourceMapper;
use Iyzipay\Model\Status;
use Iyzipay\Model\Iyzilink\IyziLinkRetriveAllProduct;
use Iyzipay\Tests\TestCase;

class IyziLinkRetriveAllResourceMapperTest extends TestCase
{
    public function test_should_map_iyzilink_retrive_all_resource_product_create()
    {
        $json = $this->retrieveJsonFile("iyzilink-retrive-all-product.json");

        $iyziLinkRetriveAllProduct = IyziLinkRetriveAllProductResourceMapper::create($json)->jsonDecode()->mapResource(new IyziLinkRetriveAllProduct());

        $this->assertNotEmpty($iyziLinkRetriveAllProduct);
        $this->assertEquals(Status::SUCCESS, $iyziLinkRetriveAllProduct->getStatus());
        $this->assertEquals(Locale::TR, $iyziLinkRetriveAllProduct->getLocale());
        $this->assertEquals(1537167363043, $iyziLinkRetriveAllProduct->getSystemTime());
        $this->assertEquals("5b9f5000c5310", $iyziLinkRetriveAllProduct->getConversationId());
        $this->assertEquals(null, $iyziLinkRetriveAllProduct->getListingReviewed());
        $this->assertEquals(null, $iyziLinkRetriveAllProduct->getTotalCount());
        $this->assertEquals(null, $iyziLinkRetriveAllProduct->getCurrentPage());
        $this->assertEquals(null, $iyziLinkRetriveAllProduct->getPageCount());
        $this->assertEquals(null, $iyziLinkRetriveAllProduct->getItems());
        $this->assertEquals(null, $iyziLinkRetriveAllProduct->getErrorCode());
        $this->assertEquals(null, $iyziLinkRetriveAllProduct->getErrorMessage());
        $this->assertEquals(null, $iyziLinkRetriveAllProduct->getErrorGroup());
        $this->assertJson($iyziLinkRetriveAllProduct->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $iyziLinkRetriveAllProduct->getRawResult());
    }
}