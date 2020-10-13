<?php


namespace workspace\console\controllers;


use core\App;
use core\console\ConsoleController;
use core\modules\ModulesHandler;

class ModController extends ConsoleController
{
    public function actionInit()
    {
        file_put_contents('mods.json', '');
        $modules = new ModulesHandler();
        $modules->addToManifest();
    }

    public function actionList()
    {
        $mods = App::getMods();
        foreach ($mods as $key => $mod) {
            $this->out->r($key . ' ' . $mod['version'], $mod['status'] === 'active' ? 'green' : 'yellow');
        }
    }

}