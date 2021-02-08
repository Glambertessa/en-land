<?php


namespace workspace\modules\settings\controllers;


use core\App;
use core\Controller;
use workspace\modules\settings\models\Settings;
use workspace\modules\settings\requests\SettingsSearchRequest;

class SocialController extends SettingsController
{
    protected function init()
    {
        $this->viewPath = '/modules/settings/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Social', 'url' => 'admin/social']);
    }

    public function actionIndex()
    {
        $request = new SettingsSearchRequest();
        $request->label = 'social';
        $model = Settings::search($request);

        return $this->render('social/index.tpl', ['h1' => 'Социальные Сети', 'options' => $this->setOptions($model)]);
    }

    public function actionStore()
    {
        if(isset($_POST['key']) && isset($_POST['value'])) {
            $model = new Settings();
            $model->key = $_POST['key'];
            $model->value = $_POST['value'];
            $model->label = 'social';
            $model->save();

            var_dump($model);
            $this->redirect('admin/social');
        } else
            return $this->render('social/store.tpl', ['h1' => 'Добавить']);
    }


    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'key' => 'Ключ',
                'value' => 'Значение',
                'label' => 'Категория',
            ],
            'baseUri' => 'social'
        ];
    }
}