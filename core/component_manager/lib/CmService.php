<?php

namespace core\component_manager\lib;


use core\App;
use core\component_manager\interfaces\Rep;
use core\component_manager\traits\Delete;
use core\component_manager\traits\Unpack;
use core\Debug;
use core\HZip;
use core\modules\ModulesHandler;
use core\Request;
use Exception;


class CmService
{
    use Unpack;
    use Delete;

    /**
     * @var Rep
     */
    public $rep;

    /**
     * @var
     */
    public $mod;

    /**
     * CmService constructor.
     */
    public function __construct()
    {
        $this->getRep();
        $this->mod = new Mod();
    }

    /**
     * @param string $slug
     * @return string|null
     */
    public function getVersion(string $slug): ?string
    {
        $component = $this->getComponentInfo($slug);

        return $component->version;
    }

    /**
     * @param string $slug
     * @return bool
     */
    public function checkVersion(string $slug): bool
    {
        return ($this->getVersion($slug) === $this->mod->getLocMod($slug)['version']);
    }

    /**
     * @param string $slug
     * @return bool
     */
    public function isInstalled(string $slug): bool
    {
        return ($this->mod->getLocMod($slug)['name'] === $slug);
    }

    /**
     * @param string $slug
     * @return bool
     */
    public function updateCurrentVersion(string $slug): bool
    {
        if ($this->checkVersion($slug) === FALSE)
            return $this->download($slug);
        else
            return false;
    }

    /**
     * @param string $slug
     * @return bool
     */
    public function getIsInstalled(string $slug): bool
    {
        if ($this->isInstalled($slug) === FALSE)
            return $this->download($slug);
        else
            return false;
    }

    /**
     * @param string $slug
     * @return array
     */
    public function getLocMod(string $slug): array
    {
        return $this->mod->getLocMod($slug);
    }

    /**
     * @param string $slug
     * @return array
     */
    public function getVersions(string $slug)
    {
        return ['repository' => $this->getVersion($slug),
            'local' => $this->mod->getVersion($slug)];
    }

    /**
     * @return mixed
     */

    public function getAllVersions()
    {
        return $this->mod->getAllVersions();
    }

    /**
     * @param string $slug
     * @return Component
     */
    public function getComponentInfo(string $slug): Component
    {
        $url = Config::get()->byKey('url');
        $url = $url . '/components/' . $slug . '/manifest.json';
        $info = $this->rep->parse($url)->asArray();

        return new Component($info);
    }

    /**
     * @return array
     */
    public function getComponentsInfo()
    {
        $mods = [];
        foreach ($this->mod->getAllSlug() as $slug)
            $mods[] = array_merge(['slug' => $slug], $this->getVersions($slug));

        return $mods;
    }

    /**
     * @param string $status
     * @return array
     */
    public function getByStatus(string $status)
    {
        return $this->mod->getByStatus($status);
    }

    /**
     * @param string $name
     * @return array
     */
    public function getByName(string $name)
    {
        return $this->mod->getByName($name);
    }

    /**
     * @param string $data
     * @return bool
     */
    public function download(string $data): bool
    {
        try {
            $path = "/workspace/modules/";
            $data = json_decode($data);
            $slug = $data->name;
            $version = $data->version;
            $filename = "$slug.zip";

            $this->rep->download(App::$config['component_manager']['url'] . "/cloud/modules/$slug/$version/$filename", "/$filename");

            $this->unpack("/$filename", $path, $slug);
            unlink($filename);

            $this->mod->save($slug, ['version' => $version, 'status' => 'active', 'type' => 'module']);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param string $data
     * @return bool
     */
    public function update(string $data): bool
    {
        try {
            $mod = new Mod();
            $data = json_decode($data);
            $slug = $data->name;

            $this->rep->download(App::$config['component_manager']['url'] . "/cloud/modules/$slug/$data->version/$slug.zip", "/$slug.zip");
            $this->unpack("/$slug.zip", "/workspace/modules/$slug/temp", $slug);

            HZip::zipDir("workspace/modules/$slug/temp/$slug/core","core.zip");
            $this->unpack("/core.zip", "/workspace/modules/$slug", 'core');

            $mod->deleteDirectory("workspace/modules/$slug/temp/");
            unlink("$slug.zip");
            unlink("core.zip");

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param string $data
     * @return bool
     * @throws Exception
     */
    public function upload(string $data): bool
    {
        $data = json_decode($data);
        $slug = $data->name;
        $version = $data->version;

        HZip::zipDir("workspace/modules/$slug", "$slug.zip");

        $request = curl_init(App::$config['component_manager']['url'] . '/save');
        curl_setopt($request, CURLOPT_POST, true);

        $file = file_get_contents("$slug.zip");

        curl_setopt($request, CURLOPT_POSTFIELDS, ['file' => base64_encode($file), 'slug' => $slug, 'version' => $version]);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($request);
        curl_close($request);

        unlink("$slug.zip");

        return $result;
    }

    /**
     * @param string $slug
     * @return bool
     */
    public function deleteMod(string $slug): bool
    {
        $url = '/modules/' . $slug . '/manifest.json';
        $path = '/modules/' . $slug;
        $folder = '/unpack';
        $delete = $this->delete($url, $path, $folder);
        $modDelete = $this->modDeleteFromJson($slug);

        return (true ?: $delete and $modDelete ?: false);
    }

    /**
     * @param string $slug
     * @param array $data
     * @return bool
     */
    public function save(string $slug, array $data): bool
    {
        return $this->mod->save($slug, $data);
    }

    /**
     * @param string $slug
     * @return bool
     */
    public function modDeleteFromJson(string $slug): bool
    {
        return $this->mod->delete($slug);
    }

    /**
     * @param string $slug
     * @param array $data
     * @return bool
     */
    public function modChangeStatus(string $slug, array $data): bool
    {
        return $this->mod->changeStatus($slug, $data);
    }

    /**
     * @param string $data
     * @return bool
     */
    public function modChangeStatusToActive(string $data): bool
    {
        $data = json_decode($data);
        $slug = $data->name;

        $status = ['status' => 'active'];

        return $this->modChangeStatus($slug, $status);
    }

    /**
     * @param string $data
     * @return bool
     */
    public function modChangeStatusToInactive(string $data): bool
    {
        $data = json_decode($data);
        $slug = $data->name;

        $status = ['status' => 'inactive'];

        return $this->modChangeStatus($slug, $status);
    }

    /**
     * @param string $slug
     * @param array $data
     * @return bool
     */
    public function modChangeVersion(string $slug, array $data): bool
    {
        return $this->mod->changeVersion($slug, $data);
    }

    /**
     *
     */
    private function getRep()
    {
        $class = Config::get()->byKey('repType');
        $this->rep = new $class();
    }
}