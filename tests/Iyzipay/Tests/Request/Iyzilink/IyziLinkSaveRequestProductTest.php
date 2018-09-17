<?php
namespace Iyzipay\Tests\Request\Iyzilink;

use Iyzipay\Tests\TestCase;
use IyziPay\Request\Iyzilink\IyziLinkSaveProductRequest;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Currency;
use Iyzipay\FileBase64Encoder;

class IyziLinkSaveRequestProductTest extends TestCase
{
    public function test_should_save_request_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $imagePath = __DIR__ . '/images/sample_image.jpg';

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("Sample Integration", $jsonObject["name"]);
        $this->assertEquals("Sample Integration", $jsonObject["description"]);
        $this->assertEquals(FileBase64Encoder::encode($imagePath), $jsonObject["encodedImageFile"]);
        $this->assertEquals(1, $jsonObject["price"]);
        $this->assertEquals(Currency::TL, $jsonObject["currencyCode"]);
        $this->assertEquals(false, $jsonObject["addressIgnorable"]);
        $this->assertEquals(1, $jsonObject["soldLimit"]);
        $this->assertEquals(false, $jsonObject["installmentRequested"]);
        $this->assertEquals("test", $jsonObject["token"]);
        $this->assertEquals("test", $jsonObject["url"]);
        $this->assertEquals("test", $jsonObject["imageUrl"]);
    }


    private function prepareRequest()
    {
        $request = new IyziLinkSaveProductRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setName("Sample Integration");
        $request->setDescription("Sample Integration");
        $imagePath = __DIR__.'/images/sample_image.jpg';
        $request->setBase64EncodedImage(FileBase64Encoder::encode($imagePath));
        $request->setPrice(1);
        $request->setCurrency(Currency::TL);
        $request->setAddressIgnorable(false);
        $request->setSoldLimit(1);
        $request->setInstallmentRequest(false);
        $request->setToken('test');
        $request->setUrl('test');
        $request->setImageUrl('test');

        return $request;
    }
}