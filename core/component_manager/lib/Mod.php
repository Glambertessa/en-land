<?php

namespace core\component_manager\lib;


use core\component_manager\interfaces\Rep;
use core\Debug;
use core\modules\Modules;

class Mod
{
    /**
     * @var
     */
    public $mod;

    /**
     * @var
     */
    public $file;

    /**
     * Mod constructor.
     */
    public function __construct()
    {
        $this->load();
    }

    /**
     *
     */
    public function load()
    {
        $this->file = ROOT_DIR . "/mods.json";
        $mods = file_get_contents($this->file);
        $this->mod = json_decode($mods, true);
    }

    /**
     * @param string $slug
     * @return array
     */
    public function getRelations(string $slug) : array
    {
        $rel = new RelationsHandler();
        $rel->init($slug);

        return $rel->arr();
    }

    /**
     * @param string $slug
     * @return mixed
     */
    public function getVersion(string $slug)
    {
        return $this->mod[$slug]['version'];
    }

    /**
     * @param string $status
     * @return array
     */
    public function getByStatus(string $status)
    {
       $allStatus = [];
        foreach ($this->mod as $key => $value)
            if (in_array($status, $value))
                $allStatus[$key] = $value;

        return $allStatus;
    }

    /**
     * @param string $slug
     * @return array
     */
    public function getLocMod(string $slug): array
    {
        $type = $this->getModInfo($slug)['type'];

        $file = ROOT_DIR . Config::get()->byKey($type . 'Path') . $slug .  "/manifest.json";

        if (file_exists($file))
            $mods = file_get_contents($file);
        else
            $mods = '{"name":""}';

        return $mod = json_decode($mods, true);
    }

    /**
     * @param $path
     * @return array
     */
    public function getLocModByFolder($path) :array
    {
        $dirs = scandir($path);
        unset($dirs[0]);
        unset($dirs[1]);

        return $dirs;
    }

    public function getLocModObjArr($modules_path)
    {
        $local_modules = $this->getLocModByFolder("$modules_path/");
        $modules = [];

        if (isset($local_modules))
            foreach ($local_modules as $local_module) {
                $manifest = json_decode(file_get_contents("$modules_path/$local_module/manifest.json"));
                $module = new Modules();
                $module->init($manifest->name, $manifest->version, $manifest->description,
                    $this->getModInfo($local_module)['status'], 'local', $manifest->relations);
                array_push($modules, $module);
            }

        return $modules;
    }

    /**
     * @param string $slug
     * @return array
     */
    public function getModInfo(string $slug): array
    {
        $file = ROOT_DIR . "/mods.json";
        $json = file_get_contents($file);
        $mods = json_decode($json, true);

        if (isset($mods[$slug]))
            return $mods[$slug];
        else
            return ['status' => 'not downloaded', 'type' => ''];
    }

    /**
     * @return mixed
     */
    public function getAllVersions()
    {
        $onlyVersion = [];
        foreach ($this->mod as $key => $value)
            $onlyVersion[] = $value['version'];

        return $onlyVersion;
    }

    /**
     * @param $name
     * @return array
     */
    public function getByName($name)
    {
        $all = [];
        foreach ($this->mod as $key => $value)
            if (in_array($name, $value))
                $all[$key] = $value;

        return $all;
    }

    /**
     * @param string $slug
     * @return mixed
     */
    public function getSlug(string $slug)
    {
        $slug = array_search($slug, $this->getAllSlug());

        return $this->getAllSlug()[$slug];
    }

    /**
     * @return mixed
     */
    public function getAllSlug()
    {
        $onlySlug = [];
        foreach ($this->mod as $key => $value)
             $onlySlug[] = $key;

        return $onlySlug;
    }

    /**
     * @param string $slug
     * @param array $data
     * @return bool
     */
    public function save(string $slug, array $data = []): bool
    {
        foreach ($data as $key => $value)
            $this->mod[$slug][$key] = $value;

        return file_put_contents($this->file, json_encode($this->mod));
    }

    /**
     * @param string $slug
     * @return bool
     */
    public function delete(string $slug): bool
    {
        unset($this->mod[$slug]);

        return file_put_contents($this->file, json_encode($this->mod));
    }

    /**
     * @param string $slug
     * @param array $status
     * @return bool
     */
    public function changeStatus(string $slug, array $status = []): bool
    {
        return $this->save($slug, $status);
    }

    /**
     * @param string $slug
     * @param array $data
     * @return bool
     */
    public function changeVersion(string $slug, array $data = []): bool
    {
        return $this->save($slug, $data);
    }

    /**
     * @param string $dir
     * @return bool
     */

    public function deleteDirectory($dir) {
        if (!file_exists($dir)) return true;
        if (!is_dir($dir)) return unlink($dir);

        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') continue;
            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) return false;
        }

        return rmdir($dir);
    }
}