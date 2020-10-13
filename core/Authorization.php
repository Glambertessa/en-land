<?php


namespace core;


class Authorization
{
    /**
     * @param $url
     * @param $username
     * @param $password
     * @return string
     */
    public function basicAuth($url, $username, $password) : string
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: ' .
            base64_encode('Basic ' . $username . ':' . $password)]);
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }
}