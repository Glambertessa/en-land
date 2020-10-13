<?php


namespace workspace\modules\adminlte\controllers;


use core\App;
use core\Controller;
use core\Debug;

class AdminController extends Controller
{
    protected function init()
    {
        if(!isset($_SESSION['role']) || $_SESSION['role'] != 1) $this->redirect('');
        $this->viewPath = '/modules/adminlte/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
    }

    public function actionIndex()
    {
        $bc_options = [
            'class' => '',
            'separator' => ' > ',
            'items' => [
                [
                    'text' => 'AdminPanel',
                ],
            ],
        ];

        return $this->render('admin/index.tpl', ['h1' => 'AdminLte', 'bc_options' => $bc_options]);
    }
}