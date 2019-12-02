<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\SubscriptionProduct;
use Iyzipay\Request\Subscription\SubscriptionCreateProductRequest;
use Iyzipay\Request\Subscription\SubscriptionUpdateProductRequest;
use Iyzipay\Request\Subscription\SubscriptionRetrieveProductRequest;
use Iyzipay\Request\Subscription\SubscriptionDeleteProductRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionProductTest extends IyzipayResourceTestCase
{
    public function test_should_subscription_product()
    {
        $this->expectHttpPost();
        $product = SubscriptionProduct::create(new SubscriptionCreateProductRequest(), $this->options);
        $this->verifyResource($product);
    }
    public function test_should_subscription_update_product()
    {
        $this->expectHttpPost();
        $product = SubscriptionProduct::update(new SubscriptionUpdateProductRequest(), $this->options);
        $this->verifyResource($product);
    }
    public function test_should_subscription_retrieve_product()
    {
        $this->expectHttpGetV2();
        $product = SubscriptionProduct::retrieve(new SubscriptionRetrieveProductRequest(), $this->options);
        $this->verifyResource($product);
    }
    public function test_should_subscription_delete_product()
    {
        $this->expectHttpDelete();
        $delete = SubscriptionProduct::delete(new SubscriptionDeleteProductRequest(), $this->options);
        $this->verifyResource($delete);
    }
}