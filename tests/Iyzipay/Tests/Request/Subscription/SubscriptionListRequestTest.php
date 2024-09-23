<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionListRequest;
use Iyzipay\Tests\TestCase;

class SubscriptionListRequestTest extends TestCase {
    public function testShouldGetJsonString(): void {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(1, $jsonObject['page']);
        $this->assertEquals(10, $jsonObject['count']);
        $this->assertEquals(\Iyzipay\Model\Status::ACTIVE, $jsonObject['subscriptionStatus']);
        $this->assertEquals('c8ab43da-f4b3-40d2-b1ef-620da93ec3e9', $jsonObject['subscriptionReferenceCode']);
        $this->assertEquals('566b2e1a-5046-4438-9b62-c8cf761f61d1', $jsonObject['customerReferenceCode']);
        $this->assertEquals('c1d489b6-9adc-42fa-88ae-47ea2e5dbe1e', $jsonObject['pricingPlanReferenceCode']);
        $this->assertEquals('f219267d-ce05-4039-a773-225ea44aacd1', $jsonObject['parentReferenceCode']);
        $this->assertEquals('2024-01-01', $jsonObject['startDate']);
        $this->assertEquals('2024-02-02', $jsonObject['endDate']);
    }

    private function prepareRequest(): SubscriptionListRequest {
        $request = new SubscriptionListRequest();
        $request->setPage(1);
        $request->setCount(10);
        $request->setSubscriptionStatus(\Iyzipay\Model\Status::ACTIVE);
        $request->setSubscriptionReferenceCode('c8ab43da-f4b3-40d2-b1ef-620da93ec3e9');
        $request->setCustomerReferenceCode('566b2e1a-5046-4438-9b62-c8cf761f61d1');
        $request->setPricingPlanReferenceCode('c1d489b6-9adc-42fa-88ae-47ea2e5dbe1e');
        $request->setParentReferenceCode('f219267d-ce05-4039-a773-225ea44aacd1');
        $request->setStartDate('2024-01-01');
        $request->setEndDate('2024-02-02');
        return $request;
    }
}
