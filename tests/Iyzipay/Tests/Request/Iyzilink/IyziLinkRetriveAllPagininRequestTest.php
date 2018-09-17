<?php
namespace Iyzipay\Tests\Request;

use Iyzipay\Tests\TestCase;
use IyziPay\Request\Iyzilink\IyziLinkRetriveAllPagininRequest;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Currency;

class IyziLinkRetriveAllPagininRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();


        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals(1, $jsonObject["page"]);
        $this->assertEquals(5, $jsonObject["count"]);

    }


    private function prepareRequest()
    {
        $request = new IyziLinkRetriveAllPagininRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPage(1);
        $request->setCount(5);

        return $request;
    }
}