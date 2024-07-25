<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionDeleteCustomerRequest;
use Iyzipay\Tests\TestCase;

class SubscriptionDeleteCustomerRequestTest extends TestCase {
    public function testShouldGetJsonString(): void {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals('566b2e1a-5046-4438-9b62-c8cf761f61d1', $jsonObject['customerReferenceCode']);
    }

    private function prepareRequest() {
        $request = new SubscriptionDeleteCustomerRequest();
        $request->setCustomerReferenceCode('566b2e1a-5046-4438-9b62-c8cf761f61d1');
        return $request;
    }
}
