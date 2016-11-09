<?php

namespace Iyzipay;

class IyzipayResource extends ApiResource
{
    private $status;
    private $errorCode;
    private $errorMessage;
    private $errorGroup;
    private $locale;
    private $systemTime;
    private $conversationId;

    protected static function getHttpHeaders(Request $request, Options $options)
    {
        $header = array(
            "Accept: application/json",
            "Content-type: application/json",
        );

        $rnd = uniqid();
        array_push($header, "Authorization: " . self::prepareAuthorizationString($request, $options, $rnd));
        array_push($header, "x-iyzi-rnd: " . $rnd);
        array_push($header, "x-iyzi-client-version: " . "iyzipay-php-2.0.25");
        return $header;
    }

    protected static function prepareAuthorizationString(Request $request, Options $options, $rnd)
    {
        $hash = HashGenerator::generateHash($options->getApiKey(), $options->getSecretKey(), $rnd, $request);
        return vsprintf("IYZWS %s:%s", array($options->getApiKey(), $hash));
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    public function getErrorGroup()
    {
        return $this->errorGroup;
    }

    public function setErrorGroup($errorGroup)
    {
        $this->errorGroup = $errorGroup;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    public function getSystemTime()
    {
        return $this->systemTime;
    }

    public function setSystemTime($systemTime)
    {
        $this->systemTime = $systemTime;
    }

    public function getConversationId()
    {
        return $this->conversationId;
    }

    public function setConversationId($conversationId)
    {
        $this->conversationId = $conversationId;
    }
}