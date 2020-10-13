<?php

namespace core\component_manager\lib;


use core\component_manager\interfaces\Rep;

class FileRep implements Rep
{
    public $content;

    /**
     * @param string $url
     * @return Rep
     */
    public function parse(string $url): Rep
    {
        $this->content = file_get_contents($url);

        return $this;
    }

    /**
     * @param string $url
     * @param string $path
     * @return bool
     */
    public function download(string $url, string $path): bool
    {
        $path = ROOT_DIR . '/download/' . $path . '/' . 'manifest.zip';
        if (fopen($url, "r")) {
            file_put_contents($path, file_get_contents($url));
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $url
     * @param string $path
     * @return bool
     */
    public function upload(string $url, string $path): bool
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
        // TODO: Implement raw() method.
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function asArray()
    {
        // TODO: Implement asArray() method.
        return json_decode($this->content, true);
    }
}