<?php

namespace Iyzipay\Tests\Model\Iyzilink;

use Iyzipay\Model\Status;
use Iyzipay\Model\Iyzilink\IyziLinkUpdateProductStatus;
use Iyzipay\Request\Iyzilink\IyziLinkUpdateProductStatusRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class IyziLinkUpdateProductStatusTest extends IyzipayResourceTestCase {
    public function testShouldUpdateProductStatus(): void {
        $request = new IyziLinkUpdateProductStatusRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setToken('AAM');
        $request->setProductStatus(Status::PASSIVE);

        $this->expectHttpPatch();
        $iyziLinkUpdateProductStatus = IyziLinkUpdateProductStatus::create($request, $this->options);
        $this->verifyResource($iyziLinkUpdateProductStatus);
    }
}
