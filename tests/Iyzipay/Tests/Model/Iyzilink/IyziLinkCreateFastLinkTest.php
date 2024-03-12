<?php

namespace Iyzipay\Tests\Model\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkFastLink;
use Iyzipay\Request\Iyzilink\IyziLinkCreateFastLinkRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class IyziLinkCreateFastLinkTest extends IyzipayResourceTestCase {
    public function test_should_create_fast_link() {
        $request = new IyziLinkCreateFastLinkRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setDescription("ft-description-fast-link");
        $request->setPrice(10);
        $request->setCurrencyCode("TRY");
        $request->setSourceType("WEB");

        $this->expectHttpPost();
        $fastLink = IyziLinkFastLink::create($request, $this->options);
        $this->verifyResource($fastLink);
    }
}
