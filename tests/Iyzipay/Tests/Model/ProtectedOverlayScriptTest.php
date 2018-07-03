<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ProtectedOverlayScript;
use Iyzipay\Request\RetrieveProtectedOverlayScriptRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ProtectedOverlayScriptTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_protected_Overlay_script()
    {
        $this->expectHttpPost();

        $protectedOverlayScript = ProtectedOverlayScript::retrieve(new RetrieveProtectedOverlayScriptRequest(), $this->options);

        $this->verifyResource($protectedOverlayScript);
    }
}