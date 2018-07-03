<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ProtectedOverlayScript;

class ProtectedOverlayScriptMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ProtectedOverlayScriptMapper($rawResult);
    }

    public function mapProtectedOverlayScriptFrom(ProtectedOverlayScript $protectedOverlayScript, $jsonObject)
    {
        parent::mapResourceFrom($protectedOverlayScript, $jsonObject);

        if (isset($jsonObject->protectedShopId)) {
            $protectedOverlayScript->setProtectedShopId($jsonObject->protectedShopId);
        }
        if (isset($jsonObject->overlayScript)) {
            $protectedOverlayScript->setOverlayScript($jsonObject->overlayScript);
        }
        return $protectedOverlayScript;
    }

    public function mapProtectedOverlayScript(ProtectedOverlayScript $protectedOverlayScript)
    {
        return $this->mapProtectedOverlayScriptFrom($protectedOverlayScript, $this->jsonObject);
    }
}