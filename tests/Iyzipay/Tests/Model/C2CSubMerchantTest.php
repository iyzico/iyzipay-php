<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\C2CSubMerchant;
use Iyzipay\Model\Locale;
use Iyzipay\Request\CreateC2CSubMerchantRequest;
use Iyzipay\Request\VerifyC2CSubMerchantRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class C2CSubMerchantTest extends IyzipayResourceTestCase {
    public function testShouldCreateC2CSubMerchant(): void {
        $this->expectHttpPost();
        $c2cSubMerchant = C2CSubMerchant::create($this->prepareCreateRequest(), $this->options);
        $this->verifyResource($c2cSubMerchant);
    }

    public function testShouldVerifyC2CSubMerchant(): void {
        $this->expectHttpPost();
        $c2cSubMerchant = C2CSubMerchant::verify($this->prepareVerifyRequest(), $this->options);
        $this->verifyResource($c2cSubMerchant);
    }

    private function prepareCreateRequest(): CreateC2CSubMerchantRequest {
        $request = new CreateC2CSubMerchantRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId('299487456');
        $request->setName('John');
        $request->setSurname('Doe');
        $request->setEmail('john@doe.com');
        $request->setGsmNumber('+905558001479');
        $request->setTckNo('55555555555');
        $request->setBirthDate('1996-10-07');
        $request->setAddress('Besiktas / Istanbul');
        $request->setExternalId('ccd74b86-e4a8-469e-b3d3-312f0544ea6e');
        return $request;
    }

    private function prepareVerifyRequest(): VerifyC2CSubMerchantRequest {
        $request = new VerifyC2CSubMerchantRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId('422117402');
        $request->setTxId('4973f734-e946-40dc-b3a9-34e0efb330d5');
        $request->setSmsVerificationCode('HZ87equxm70klGxX1nZX7A==');
        return $request;
    }
}
