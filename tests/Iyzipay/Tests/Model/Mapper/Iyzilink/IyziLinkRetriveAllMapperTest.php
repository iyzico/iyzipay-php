<?php

namespace Iyzipay\Tests\Model\Mapper\Iyzilink;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\Iyzilink\IyziLinkRetrieveAllProductMapper;
use Iyzipay\Model\Status;
use Iyzipay\Model\Iyzilink\IyziLinkRetrieveAllProduct;
use Iyzipay\Tests\TestCase;

class IyziLinkRetriveAllMapperTest extends TestCase
{
    public function test_should_map_iyzilink_retrieve_all_product_create()
    {
        $json = $this->retrieveJsonFile("iyzilink-retrieve-all-product.json");

        $iyziLinkRetriveAllProduct = IyziLinkRetrieveAllProductMapper::create($json)->jsonDecode()->mapIyziLinkRetriveAllProduct(new IyziLinkRetrieveAllProduct());

        $this->assertNotEmpty($iyziLinkRetriveAllProduct);
        $this->assertEquals(Status::SUCCESS, $iyziLinkRetriveAllProduct->getStatus());
        $this->assertEquals(Locale::TR, $iyziLinkRetriveAllProduct->getLocale());
        $this->assertEquals(1537167363043, $iyziLinkRetriveAllProduct->getSystemTime());
        $this->assertEquals("5b9f5000c5310", $iyziLinkRetriveAllProduct->getConversationId());
        $this->assertEquals(true, $iyziLinkRetriveAllProduct->getListingReviewed());
        $this->assertEquals("85", $iyziLinkRetriveAllProduct->getTotalCount());
        $this->assertEquals(1, $iyziLinkRetriveAllProduct->getCurrentPage());
        $this->assertEquals(43, $iyziLinkRetriveAllProduct->getPageCount());
        $this->assertEquals("items", $iyziLinkRetriveAllProduct->getItems());
        $this->assertJson($iyziLinkRetriveAllProduct->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $iyziLinkRetriveAllProduct->getRawResult());
    }
}