<?php

namespace Iyzipay\Tests;

use Iyzipay\FileBase64Encoder;

class FileBase64EncoderTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_base64file_helper()
    {
        $imagePath = __DIR__ . '/images/sample_image.jpg';
        $base64FileHelper = new FileBase64Encoder();
        $encodedImage     = $base64FileHelper->encode($imagePath);

        $this->assertNotNull($encodedImage);

    }
}