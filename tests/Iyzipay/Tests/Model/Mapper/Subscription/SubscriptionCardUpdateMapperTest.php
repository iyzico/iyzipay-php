<?php

namespace Iyzipay\Tests\Model\Mapper\Subscription;

use Iyzipay\Model\Mapper\Subscription\SubscriptionCardUpdateMapper;
use Iyzipay\Model\Subscription\SubscriptionCardUpdate;
use Iyzipay\Tests\TestCase;

class SubscriptionCardUpdateMapperTest extends TestCase
{
    public function test_should_map_subscription_card_update_mapper()
    {
        $json = $this->retrieveJsonFile("subscription_checkoutform.json");
        $checkoutform = SubscriptionCardUpdateMapper::create($json)->jsonDecode()->mapSubscriptionCardUpdate(new SubscriptionCardUpdate());

        $this->assertNotEmpty($checkoutform);
        $this->assertEquals("<script></script>", $checkoutform->getCheckoutFormContent());
        $this->assertEquals("0287c8ef-4df9-4948-a133-87407dc43653", $checkoutform->getConversationId());
        $this->assertEquals("tr", $checkoutform->getLocale());
        $this->assertEquals("success",$checkoutform->getStatus());
        $this->assertEquals("1573406097048", $checkoutform->getSystemTime());
        $this->assertEquals("9a6519d2-b1a2-463d-aaea-cb7921e42de5", $checkoutform->getToken());
        $this->assertEquals("1800", $checkoutform->getTokenExpireTime());
        $this->assertJson($checkoutform->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $checkoutform->getRawResult());

    }
}