<?php

namespace core\component_manager\lib;

use core\component_manager\interfaces\Rep;

class CurlRep implements Rep
{
    public $content;

    /**
     * @param string $url
     * @return Rep
     */
    public function parse(string $url): Rep
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        $response = curl_exec($curl);
        curl_close($curl);
        $this->content = $response;

        return $this;
    }

    /**
     * @param string $url
     * @param string $path
     * @return bool
     */
    public function download(string $url, string $path):bool
    {
        $ch = curl_init($url);
        if (curl_errno($ch))
            return false;
        else {
            $fp = fopen(ROOT_DIR . $path ,'wb' );
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);

            return true;
        }
    }

    /**
     * @param string $url
     * @param string $path
     * @return bool
     */
    public function upload(string $url, string $path):bool
    {
        return 1;
    }

    public function getComponent()
    {
        // TODO: Implement getComponent() method.
    }

    /**
     * @param string $slug
     * @return array|null
     */
    public function getManifest(string $slug): ?array
    {
        // TODO: Implement getManifest() method.
    }

    /**
     * @return mixed
     */
    public function raw()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function asArray()
    {
        return json_decode($this->content, true);
    }
}