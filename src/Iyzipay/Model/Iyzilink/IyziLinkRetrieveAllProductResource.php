<?php

namespace Iyzipay\Model\Iyzilink;

use Iyzipay\IyzipayResource;

class IyziLinkRetrieveAllProductResource extends IyzipayResource
{
    private $listingReviewed;
    private $totalCount;
    private $currentPage;
    private $pageCount;
    private $items;

    public function getListingReviewed()
    {
        return $this->listingReviewed;
    }

    public function setListingReviewed($listingReviewed)
    {
        $this->listingReviewed = $listingReviewed;
    }

    public function getTotalCount()
    {
        return $this->totalCount;
    }

    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
    }

    public function getPageCount()
    {
        return $this->pageCount;
    }

    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }
}