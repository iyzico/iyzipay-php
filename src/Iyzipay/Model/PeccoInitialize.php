<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\PeccoInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePeccoInitializeRequest;

class PeccoInitialize extends IyzipayResource
{
    private $htmlContent;
    private $redirectUrl;
    private $token;
    private $tokenExpireTime;

    public static function create(CreatePeccoInitializeRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/pecco/initialize", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return PeccoInitializeMapper::create($rawResult)->jsonDecode()->mapPeccoInitialize(new PeccoInitialize());
    }

    public function getHtmlContent()
    {
        return $this->htmlContent;
    }

    public function setHtmlContent($htmlContent)
    {
        $this->htmlContent = $htmlContent;
    }

    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getTokenExpireTime()
    {
        return $this->tokenExpireTime;
    }

    public function setTokenExpireTime($tokenExpireTime)
    {
        $this->tokenExpireTime = $tokenExpireTime;
    }
}