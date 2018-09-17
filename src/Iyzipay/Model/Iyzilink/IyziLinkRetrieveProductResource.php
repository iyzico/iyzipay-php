<?php

namespace Iyzipay\Model\Iyzilink;

use Iyzipay\IyzipayResource;

class IyziLinkRetrieveProductResource extends IyzipayResource
{
    private $item;

    public function getItem()
    {
        return $this->item;
    }

    public function setItem($item)
    {
        $this->item = $item;
    }
}