<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\InstallmentHtml;

class InstallmentHtmlMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new InstallmentHtmlMapper($rawResult);
    }

    public function mapInstallmentHtmlFrom(InstallmentHtml $installmentHtml, $jsonObject)
    {
        parent::mapResourceFrom($installmentHtml, $jsonObject);

        if (isset($jsonObject->htmlContent)) {
            $installmentHtml->setHtmlContent($jsonObject->htmlContent);
        }
        return $installmentHtml;
    }

    public function mapInstallmentHtml(InstallmentHtml $installmentHtml)
    {
        return $this->mapInstallmentHtmlFrom($installmentHtml, $this->jsonObject);
    }
}