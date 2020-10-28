<?php


namespace workspace\modules\ckeditor;


use core\App;

class Ckeditor
{

    public static function run()
    {
        $config['adminTopMenu'] = [
//            [
//                'title' => 'Elfinder',
//                'url' => 'admin/elfinder',
//                'icon' => '',
//            ],
        ];

//        $config['adminLeftMenu'] = [
//            [
//                'title' => 'Файлы',
//                'url' => '/admin/elfinder',
//                'icon' => '<i class="fas fa-folder-open"></i>',
//            ],
//        ];

        App::mergeConfig($config);

        App::$breadcrumbs->addSetting('class', 'breadcrumbs');
    }

}