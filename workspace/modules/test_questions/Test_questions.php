<?php

namespace workspace\modules\test_questions;


use core\App;

class Test_questions
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'Связи Q&A',
                'url' => '/admin/test-questions',
                'icon' => '<i class="nav-icon fas fa-arrows-alt-h"></i>',
            ],
        ];

        App::mergeConfig($config);
    }
}