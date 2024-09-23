<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Model\Subscription\SubscriptionDeleteCustomer;
use Iyzipay\Request\Subscription\SubscriptionDeleteCustomerRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionDeleteCustomerTest extends IyzipayResourceTestCase {
    public function testShouldDeleteSubscriptionCustomer(): void {
        $request = new SubscriptionDeleteCustomerRequest();
        $request->setCustomerReferenceCode('566b2e1a-5046-4438-9b62-c8cf761f61d1');

        $this->expectHttpPost();
        $customer = SubscriptionDeleteCustomer::delete($request, $this->options);
        $this->verifyResource($customer);
    }
}
