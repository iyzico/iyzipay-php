<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\ProtectedOverleyScript;
use Iyzipay\Request\RetrieveProtectedOverleyScriptRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ProtectedOverleyScriptTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_protected_overley_script()
    {
        $this->expectHttpPost();

        $protectedOverleyScript = ProtectedOverleyScript::retrieve(new RetrieveProtectedOverleyScriptRequest(), $this->options);

        $this->verifyResource($protectedOverleyScript);
    }
}