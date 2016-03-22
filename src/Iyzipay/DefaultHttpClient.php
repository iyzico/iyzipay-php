<?php

namespace Iyzipay;

class DefaultHttpClient implements HttpClient
{
    public static function create()
    {
        return new DefaultHttpClient();
    }

    public function get($url)
    {
        return $this->exchange($url, array(
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => false,
            CURLOPT_HEADER => false
        ));
    }

    public function post($url, $header, $content)
    {
        return $this->exchange($url, array(
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
        return $this->exchange($url, array(
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
        return $this->exchange($url, array(
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_POSTFIELDS => $content,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => false,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => $header
        ));
    }

    protected function exchange($url, $options)
    {
        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        return curl_exec($ch);
    }
}