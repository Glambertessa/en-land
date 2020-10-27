<?php

namespace workspace\modules\answer;


use core\App;

class Answer
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'Answer',
                'url' => '/admin/answer',
                'icon' => '<i class="nav-icon fa fa-file"></i>',
            ],
        ];

        App::mergeConfig($config);
    }
}