<?php

namespace Iyzipay\Model\Iyzilink;

use Iyzipay\IyzipayResource;

class IyziLinkDeleteProductResource extends IyzipayResource
{
    private $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}