<?php

namespace Iyzipay;

class DefaultHttpClient implements HttpClient
{
    private $curl;

    public function __construct($curl = null)
    {
        if (!$curl) {
            $curl = new Curl();
        }
        $this->curl = $curl;
    }

    public static function create($curl = null)
    {
        return new DefaultHttpClient($curl);
    }

    public function get($url)
    {
        return $this->curl->exec($url, array(
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => false,
            CURLOPT_HEADER => false
        ));
    }

    public function post($url, $header, $content)
    {
        return $this->curl->exec($url, array(
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $content,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => false,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => $header
        ));
    }

    public function put($url, $header, $content)
    {
        return $this->curl->exec($url, array(
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => $content,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => false,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => $header
        ));
    }

    public function delete($url, $header, $content = null)
    {
        return $this->curl->exec($url, array(
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_POSTFIELDS => $content,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => false,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => $header
        ));
    }
}