<?php


namespace core\modules;


use core\App;
use core\component_manager\lib\CmService;
use core\component_manager\lib\Mod;

class ModulesHandler
{
    public function addToManifest()
    {
        $mod = new Mod();
        $modules = $mod->getLocModByFolder('workspace/modules/');
        foreach ($modules as $module) {
            $manifest = file_get_contents("workspace/modules/$module/manifest.json");
            $manifest = json_decode($manifest);
            $data = ['version' => $manifest->version, 'status' => 'active', 'type' => 'module'];
            $cm = new CmService();
            $cm->mod->save($module, $data);
        }
    }

    public function versionChanged()
    {
        $data = json_decode($_POST['data']);
        $slug = $data->name;
        $version = $_POST['changed'];

        $fl = 0;
        $modules = json_decode(file_get_contents('modules.json'));
        foreach ($modules as $k => $module)
            if (!$fl)
                foreach ($module as $key => $item) {
                    if ($item->name == $slug && $item->version == $version) {
                        $temp = $module[0];
                        $module[0] = $item;
                        $module[$key] = $temp;
                        $modules[$k] = $module;
                        $fl = 1;
                        break;
                    }
                }
            else break;
        file_put_contents('modules.json', json_encode($modules));

        return $modules;
    }

    public static function clearRequest()
    {
        unset($_REQUEST['data']);
        unset($_REQUEST['changed']);
    }

    public static function post_file_get_contents($url, $data)
    {
        $opts = array('http' => ['method' => 'POST', 'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query($data)]);
        $context = stream_context_create($opts);

        return json_decode(file_get_contents($url, false, $context));
    }

    public static function searchPosition($objects_array, $comparison_object)
    {
        foreach ($objects_array as $i => $object)
            foreach ($object as $j => $value)
                if ($value->name == $comparison_object->name)
                    return ['i' => $i, 'j' => $j];
                else break;

        return ['i' => count($objects_array), 'j' => 0];
    }

    public static function getAllModules()
    {
        $mod = new Mod();
        $local_modules = $mod->getLocModObjArr('workspace/modules');

        $server_modules = json_decode(file_get_contents(
            App::$config['component_manager']['url'] . '/server-modules'));

        foreach ($local_modules as $item) {
            $pos = self::searchPosition($server_modules, $item);
            $server_modules[$pos['i']][$pos['j']] = $item;
        }

        return $server_modules;
    }

    public function addExtToComposer($extension, $version)
    {
        $composer_file = json_decode(file_get_contents('composer.json'));
        $composer_file->require->$extension = $version;
        file_put_contents('composer.json', json_encode($composer_file));
    }
}