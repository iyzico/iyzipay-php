<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PeccoInitialize;

class PeccoInitializeMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PeccoInitializeMapper($rawResult);
    }

    public function mapPeccoInitializeFrom(PeccoInitialize $peccoInitialize, $jsonObject)
    {
        parent::mapResourceFrom($peccoInitialize, $jsonObject);

        if (isset($jsonObject->token)) {
            $peccoInitialize->setToken($jsonObject->token);
        }
        if (isset($jsonObject->htmlContent)) {
            $peccoInitialize->setHtmlContent($jsonObject->htmlContent);
        }
        if (isset($jsonObject->tokenExpireTime)) {
            $peccoInitialize->setTokenExpireTime($jsonObject->tokenExpireTime);
        }
        if (isset($jsonObject->redirectUrl)) {
            $peccoInitialize->setRedirectUrl($jsonObject->redirectUrl);
        }
        return $peccoInitialize;
    }

    public function mapPeccoInitialize(PeccoInitialize $peccoInitialize)
    {
        return $this->mapPeccoInitializeFrom($peccoInitialize, $this->jsonObject);
    }
}