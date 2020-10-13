<?php


namespace workspace\modules\settings\controllers;


use core\App;
use core\Controller;
use workspace\modules\settings\models\Settings;
use workspace\modules\settings\requests\SettingsSearchRequest;

class SettingsController extends Controller
{
    public $viewPath = '/modules/settings/views/';

    protected function init()
    {
        $this->viewPath = '/modules/settings/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Settings', 'url' => 'admin/settings']);
    }

    public function actionIndex()
    {
        $request = new SettingsSearchRequest();
        $model = Settings::search($request);

        return $this->render('settings/index.tpl', ['h1' => 'Настройки', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = Settings::where('id', $id)->first();

        $options = [
            'fields' => [
                'key' => 'key',
                'category' => [
                    'label' => 'value',
                    'value' => function($model) { return $model->value; }
                ]
            ],
        ];

        return $this->render('settings/view.tpl', ['model' => $model, 'options' => $options]);
    }

    public function actionStore()
    {
        if(isset($_POST['key']) && isset($_POST['value'])) {
            $settings = new Settings();
            $settings->key = $_POST['key'];
            $settings->value = $_POST['value'];
            $settings->save();

            $this->redirect('admin/settings');
        } else
            return $this->render('settings/store.tpl', ['h1' => 'Добавить настройку']);
    }

    public function actionEdit($id)
    {
        $model = Settings::where('id', $id)->first();

        if(isset($_POST['key']) && isset($_POST['value'])) {
            $model->key = $_POST['key'];
            $model->value = $_POST['value'];
            $model->save();

            $this->redirect('admin/settings');
        } else
            return $this->render('settings/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model]);
    }

    public function actionDelete()
    {
        Settings::where('id', $_POST['id'])->delete();
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'key' => 'Ключ',
                'category' => [
                    'label' => 'Значение',
                    'value' => function($model) { return $model->value; }
                ]
            ],
            'baseUri' => 'settings'
        ];
    }
}