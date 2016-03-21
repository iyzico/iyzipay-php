<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\Approval;
use Iyzipay\Request\CreateApprovalRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ApprovalTest extends IyzipayResourceTestCase
{
    public function test_should_approve()
    {
        $this->expectHttpPost();

        $approval = Approval::create(new CreateApprovalRequest(), $this->options);

        $this->verifyResource($approval);
    }
}