<?php

namespace Iyzipay\Tests;

use Iyzipay\Base64FileHelper;

class Base64FileHelperTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_base64file_helper()
    {
        $imagePath = __DIR__ . '/images/sample_image.jpg';
        $base64FileHelper = new Base64FileHelper();
        $encodedImage     = $base64FileHelper->encode($imagePath);

        $this->assertNotNull($encodedImage);

    }
}