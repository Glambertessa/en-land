<?php

namespace core\component_manager\traits;


use core\Debug;

trait Unpack
{
    /**
     * @param string $url
     * @param string $path
     * @param string $slug
     * @return bool
     */
   public function unpack(string $url, string $path, string $slug): bool
   {
       $zip = new \ZipArchive();
       if($zip->open(ROOT_DIR  . $url) === TRUE) {
           $zip->extractTo(ROOT_DIR . $path);
           $zip->close();
           //chmod(ROOT_DIR . $path . $slug, 0775);
           return true;
       } else {
           return false;
       }
   }
}