<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\ProtectedOverlayScriptMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveProtectedOverlayScriptRequest;

class ProtectedOverlayScript extends IyzipayResource
{
    private $protectedShopId;
    private $overlayScript;

    public static function retrieve(RetrieveProtectedOverlayScriptRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/v1/iyziup/protected/shop/detail/overlay-script", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ProtectedOverlayScriptMapper::create($rawResult)->jsonDecode()->mapProtectedOverlayScript(new ProtectedOverlayScript());
    }

    public function getProtectedShopId()
    {
        return $this->protectedShopId;
    }

    public function setProtectedShopId($protectedShopId)
    {
        $this->protectedShopId = $protectedShopId;
    }
    
     public function getOverlayScript()
    {
        return $this->overlayScript;
    }

    public function setOverlayScript($overlayScript)
    {
        $this->overlayScript = $overlayScript;
    }
}