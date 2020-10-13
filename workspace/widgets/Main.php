<?php


namespace workspace\widgets;


use core\Widget;

class Main extends Widget
{

    public function run()
    {
        echo $this->view->getTpl('main.tpl', ['text' => 'Это виджет']);
    }

}