<?php

namespace Iyzipay\Tests;

use Iyzipay\HashGenerator;
use Iyzipay\Model\Locale;
use Iyzipay\Request;

class HashGeneratorTest extends TestCase
{
    public function test_should_generate_hash()
    {
        $request = new Request();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");

        $this->assertEquals("opW0tI3yAVjzROFRTgHjIGsriHw=", HashGenerator::generateHash("apiKey", "secretKey", "rnd", $request));
    }
}