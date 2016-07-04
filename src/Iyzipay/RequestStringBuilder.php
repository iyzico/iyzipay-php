<?php

namespace Iyzipay;

class RequestStringBuilder
{
    private $requestString;

    function __construct($requestString)
    {
        $this->requestString = $requestString;
    }

    public static function create()
    {
        return new RequestStringBuilder("");
    }

    /**
     * @param $superRequestString
     * @return RequestStringBuilder
     */
    public function appendSuper($superRequestString)
    {
        if (isset($superRequestString)) {
            $superRequestString = substr($superRequestString, 1);
            $superRequestString = substr($superRequestString, 0, -1);

            if (strlen($superRequestString) > 0) {
                $this->requestString = $this->requestString . $superRequestString . ",";
            }
        }
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return RequestStringBuilder
     */
    public function append($key, $value = null)
    {
        if (isset($value)) {
            if ($value instanceof RequestStringConvertible) {
                $this->appendKeyValue($key, $value->toPKIRequestString());
            } else {
                $this->appendKeyValue($key, $value);
            }
        }
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return RequestStringBuilder
     */
    public function appendPrice($key, $value = null)
    {
        if (isset($value)) {
            $this->appendKeyValue($key, RequestFormatter::formatPrice($value));
        }
        return $this;
    }

    /**
     * @param $key
     * @param array $array
     * @return RequestStringBuilder
     */
    public function appendArray($key, array $array = null)
    {
        if (isset($array)) {
            $appendedValue = "";
            foreach ($array as $value) {
                if ($value instanceof RequestStringConvertible) {
                    $appendedValue = $appendedValue . $value->toPKIRequestString();
                } else {
                    $appendedValue = $appendedValue . $value;
                }
                $appendedValue = $appendedValue . ", ";
            }
            $this->appendKeyValueArray($key, $appendedValue);
        }
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return RequestStringBuilder
     */
    private function appendKeyValue($key, $value)
    {
        if (isset($value)) {
            $this->requestString = $this->requestString . $key . "=" . $value . ",";
        }
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return RequestStringBuilder
     */
    private function appendKeyValueArray($key, $value)
    {
        if (isset($value)) {
            $value = substr($value, 0, -2);
            $this->requestString = $this->requestString . $key . "=[" . $value . "],";
        }
        return $this;
    }

    /**
     * @return RequestStringBuilder
     */
    private function appendPrefix()
    {
        $this->requestString = "[" . $this->requestString . "]";
        return $this;
    }

    /**
     * @return RequestStringBuilder
     */
    private function removeTrailingComma()
    {
        $this->requestString = substr($this->requestString, 0, -1);
        return $this;
    }

    public function getRequestString()
    {
        $this->removeTrailingComma();
        $this->appendPrefix();
        return $this->requestString;
    }
}