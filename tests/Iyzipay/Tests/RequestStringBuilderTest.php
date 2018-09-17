<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\Locale;
use Iyzipay\RequestStringBuilder;
use Iyzipay\Request;

class RequestStringBuilderTest extends TestCase
{
    public function test_should_request_string_query()
    {
        $request = new Request();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $result = RequestStringBuilder::requestToStringQuery($request, $type = null);

        $this->assertEquals("?conversationId=123456789&locale=tr", $result);
    }
}