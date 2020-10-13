<?php


namespace workspace\modules\adminlte;


use core\App;

class Adminlte
{

    public static function run()
    {
        $config['adminTopMenu'] = [
            [
                'title' => 'Home',
                'url' => '/admin/adminlte',
                'icon' => '',
            ],
//            [
//                'title' => 'Contact',
//                'url' => 'page',
//                'icon' => '',
//            ],
        ];

        $config['adminLeftMenu'] = [

        ];

        App::$config['adminLayoutPath'] = '/modules/adminlte/views/layouts/';
        App::mergeConfig($config);

        App::$breadcrumbs->addSetting('class', 'breadcrumbs');
    }
}