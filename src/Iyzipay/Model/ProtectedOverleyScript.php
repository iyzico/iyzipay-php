<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\ProtectedOverleyScriptMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveProtectedOverleyScriptRequest;

class ProtectedOverleyScript extends IyzipayResource
{
    private $protectedShopId;
    private $overlayScript;

    public static function retrieve(RetrieveProtectedOverleyScriptRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/v1/iyziup/protected/shop/detail/overlay-script", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ProtectedOverleyScriptMapper::create($rawResult)->jsonDecode()->mapProtectedOverleyScript(new ProtectedOverleyScript());
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