<?php

namespace Iyzipay\Tests\Request\Iyzilink;

use Iyzipay\Model\Currency;
use Iyzipay\Tests\TestCase;
use Iyzipay\Request\Iyzilink\IyziLinkCreateFastLinkRequest;
use Iyzipay\Model\Locale;

class IyziLinkCreateFastLinkRequestTest extends TestCase {

    public function test_should_save_fastlink_request_object(): void {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("ft-description-fast-link", $jsonObject["description"]);
        $this->assertEquals(10, $jsonObject["price"]);
        $this->assertEquals(Currency::TL, $jsonObject["currencyCode"]);
        $this->assertEquals("WEB", $jsonObject["sourceType"]);
    }

    public function prepareRequest(): IyziLinkCreateFastLinkRequest {
        $request = new IyziLinkCreateFastLinkRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setDescription("ft-description-fast-link");
        $request->setPrice(10);
        $request->setCurrencyCode("TRY");
        $request->setSourceType("WEB");

        return $request;
    }
}
