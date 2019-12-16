<?php

namespace Iyzipay\Tests\Model\Mapper\Subscription;

use Iyzipay\Model\Mapper\Subscription\SubscriptionProductMapper;
use Iyzipay\Model\Subscription\SubscriptionProduct;
use Iyzipay\Tests\TestCase;

class SubscriptionProductMapperTest extends TestCase
{
    public function test_should_map_subscription_product_mapper()
    {
        $json = $this->retrieveJsonFile("subscription_product.json");
        $product = SubscriptionProductMapper::create($json)->jsonDecode()->mapSubscriptionProduct(new SubscriptionProduct());

        $this->assertNotEmpty($product);
        $this->assertEquals("ProductName", $product->getName());
        $this->assertEquals("descriptionOfProduct", $product->getDescription());
        $this->assertEquals("ACTIVE", $product->getProductStatus());
        $this->assertEquals("1570889376014", $product->getCreatedDate());
        $this->assertEquals( array(), $product->getPricingPlans());
        $this->assertEquals( "f52b5561-aa1b-4f31-af0b-3078cf6c4bb1", $product->getReferenceCode());
        $this->assertEquals("success", $product->getStatus());
        $this->assertEquals(null, $product->getErrorCode());
        $this->assertEquals(null, $product->getErrorMessage());
        $this->assertEquals(null, $product->getErrorGroup());
        $this->assertEquals("1570889376018", $product->getSystemTime());
        $this->assertJson($product->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $product->getRawResult());

    }

    public function test_should_map_subscription_delete_product_mapper()
    {
        $json = $this->retrieveJsonFile("subscription_items_actions.json");
        $delete = SubscriptionProductMapper::create($json)->jsonDecode()->mapSubscriptionProduct(new SubscriptionProduct());

        $this->assertNotEmpty($delete);
        $this->assertEquals("success", $delete->getStatus());
        $this->assertEquals("1570890939630", $delete->getSystemTime());
        $this->assertJson($delete->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $delete->getRawResult());
    }

}