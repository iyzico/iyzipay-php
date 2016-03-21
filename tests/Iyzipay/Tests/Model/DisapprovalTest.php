<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\Disapproval;
use Iyzipay\Request\CreateApprovalRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class DisapprovalTest extends IyzipayResourceTestCase
{
    public function test_should_disapprove()
    {
        $this->expectHttpPost();

        $disapproval = Disapproval::create(new CreateApprovalRequest(), $this->options);

        $this->verifyResource($disapproval);
    }
}