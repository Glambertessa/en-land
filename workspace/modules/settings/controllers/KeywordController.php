<?php


namespace workspace\modules\settings\controllers;


use core\App;
use workspace\modules\settings\models\Settings;
use workspace\modules\settings\requests\SettingsSearchRequest;

class KeywordController extends SettingsController
{
    protected function init()
    {
        $this->viewPath = '/modules/settings/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Keywords', 'url' => 'admin/keywords']);
    }

    public function actionIndex()
    {
        $request = new SettingsSearchRequest();
        $request->label = 'keyword';
        $model = Settings::search($request);

        return $this->render('keywords/index.tpl', ['h1' => 'Ключевые слова', 'options' => $this->setOptions($model)]);
    }

    public function actionStore()
    {
        if (isset($_POST['value'])) {
            $model = new Settings();
            $model->key = Settings::makeSlug($_POST['value']);
            $model->value = $_POST['value'];
            $model->label = 'keyword';
            $model->save();

            var_dump($model);
            $this->redirect('admin/keywords');
        } else
            return $this->render('keywords/store.tpl', ['h1' => 'Добавить']);
    }

    public function actionEdit($id)
    {
        $model = Settings::where('id', $id)->first();

        if (isset($_POST['value'])) {
            $model->value = $_POST['value'];
            $model->save();

            $this->redirect('admin/keywords');
        } else
            return $this->render('keywords/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model]);
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'key' => 'Ключ',
                'value' => 'Слово',
                'label' => 'Категория',
            ],
            'baseUri' => 'keywords'
        ];
    }
}