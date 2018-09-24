<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class PagininRequest extends Request
{
    private $page;
    private $count;


    public function getPage()
    {
        return $this->page;
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setCount($count)
    {
        $this->count = $count;
    }

    public function getJsonObject()
    {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("page", $this->getPage())
            ->add("count", $this->getCount())
            ->getObject();
    }
}
