<?php


namespace workspace\modules\adminlte\widgets;


use core\Widget;

class TopMenu extends Widget
{
    public $viewPath = '/modules/adminlte/widgets/views/';

    public function run()
    {
        echo $this->view->getTpl('topMenu.tpl');
    }
}