<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\Disapproval;
use Iyzipay\Request\CreateApprovalRequest;

class DisapprovalTest extends IyzipayResourceTestCase
{
    public function test_should_disapprove()
    {
        $this->expectHttpPost();

        $disapproval = Disapproval::create(new CreateApprovalRequest(), $this->options);

        $this->verifyResource($disapproval);
    }
}