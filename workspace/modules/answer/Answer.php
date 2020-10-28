<?php

namespace workspace\modules\answer;


use core\App;

class Answer
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'Ответы',
                'url' => '/admin/answer',
                'icon' => '<i class="nav-icon fas fa-lightbulb"></i>',
            ],
        ];

        App::mergeConfig($config);
    }
}