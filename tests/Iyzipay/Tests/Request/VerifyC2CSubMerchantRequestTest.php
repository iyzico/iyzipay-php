<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Request\VerifyC2CSubMerchantRequest;
use Iyzipay\Tests\TestCase;

class VerifyC2CSubMerchantRequestTest extends TestCase {
    public function testShouldGetJsonObject(): void {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("422117402", $jsonObject["conversationId"]);
        $this->assertEquals("4973f734-e946-40dc-b3a9-34e0efb330d5", $jsonObject["txId"]);
        $this->assertEquals("HZ87equxm70klGxX1nZX7A==", $jsonObject["smsVerificationCode"]);
    }

    public function testShouldConvertToPkiRequestString(): void {
        $request = $this->prepareRequest();

        $str =
            "[locale=tr," .
            "conversationId=422117402," .
            "txId=4973f734-e946-40dc-b3a9-34e0efb330d5," .
            "smsVerificationCode=HZ87equxm70klGxX1nZX7A==]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function testShouldGetJsonString(): void {
        $request = $this->prepareRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"422117402",
                "txId":"4973f734-e946-40dc-b3a9-34e0efb330d5",
                "smsVerificationCode":"HZ87equxm70klGxX1nZX7A=="
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest(): VerifyC2CSubMerchantRequest {
        $request = new VerifyC2CSubMerchantRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId('422117402');
        $request->setTxId('4973f734-e946-40dc-b3a9-34e0efb330d5');
        $request->setSmsVerificationCode('HZ87equxm70klGxX1nZX7A==');
        return $request;
    }
}
