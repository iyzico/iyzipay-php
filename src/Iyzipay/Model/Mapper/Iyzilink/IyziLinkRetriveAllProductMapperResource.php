<?php

namespace Iyzipay\Model\Mapper\Iyzilink;

use Iyzipay\Model\Iyzilink\IyziLinkRetriveAllProductResource;
use Iyzipay\Model\Mapper\IyzipayResourceMapper;

class IyziLinkRetriveAllProductMapperResource extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new IyzipayResourceMapper($rawResult);
    }

    public function mapIyziLinkRetriveAllProductResourceFrom(IyziLinkRetriveAllProductResource $create, $jsonObject)
    {
        parent::mapResourceFrom($create, $jsonObject);

        if (isset($jsonObject->data->listingReviewed)) {
            $create->setListingReviewed($jsonObject->data->listingReviewed);
        }
        if (isset($jsonObject->data->totalCount)) {
            $create->setTotalCount($jsonObject->data->totalCount);
        }
        if (isset($jsonObject->data->currentPage)) {
            $create->setCurrentPage($jsonObject->data->currentPage);
        }
        if (isset($jsonObject->data->pageCount)) {
            $create->setPageCount($jsonObject->data->pageCount);
        }
        if (isset($jsonObject->data->items)) {
            $create->setItems($jsonObject->data->items);
        }

        return $create;
    }

    public function mapIyziLinkRetriveAllProductResource(IyziLinkRetriveAllProductResource $create)
    {
        return $this->mapIyziLinkRetriveAllProductResourceFrom($create, $this->jsonObject);
    }
}