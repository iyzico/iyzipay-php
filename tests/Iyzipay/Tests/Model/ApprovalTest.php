<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\Approval;
use Iyzipay\Request\CreateApprovalRequest;

class ApprovalTest extends IyzipayResourceTestCase
{
    public function test_should_approve()
    {
        $this->expectHttpPost();

        $approval = Approval::create(new CreateApprovalRequest(), $this->options);

        $this->verifyResource($approval);
    }
}