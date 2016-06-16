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
            $initialize->setToken($jsonObject->token);
        }
        if (isset($jsonObject->htmlContent)) {
            $initialize->setHtmlContent($jsonObject->htmlContent);
        }
        if (isset($jsonObject->tokenExpireTime)) {
            $initialize->setTokenExpireTime($jsonObject->tokenExpireTime);
        }
        if (isset($jsonObject->redirectUrl)) {
            $initialize->setRedirectUrl($jsonObject->redirectUrl);
        }
        return $peccoInitialize;
    }

    public function mapPeccoInitialize(PeccoInitialize $peccoInitialize)
    {
        return $this->mapPeccoInitializeFrom($peccoInitialize, $this->jsonObject);
    }
}