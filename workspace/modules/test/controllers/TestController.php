<?php


namespace workspace\modules\test\controllers;


use core\App;
use core\Controller;
use core\GridViewHelper;
use workspace\modules\test\models\Test;
use workspace\modules\test\requests\TestSearchRequest;

class TestController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/test/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Test', 'url' => 'admin/test']);
    }

    public function actionIndex()
    {
        $request = new TestSearchRequest();
        $model = Test::search($request);

        return $this->render('test/index.tpl', ['h1' => 'Тесты', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = Test::where('id', $id)->first();

        return $this->render('test/view.tpl', ['model' => $model, 'options' => $this->setOptions($model),
            'questions_options' => $this->setQuestionsOptions($model->questions)]);
    }

    public function actionStore()
    {
        $request = new TestSearchRequest();

        if ($this->validation($request)) {
            $model = new Test();
            $model->_save();

            $this->redirect('admin/test');
        } else
            return $this->render('test/store.tpl', ['h1' => 'Добавить']);
    }

    public function actionEdit($id)
    {
        $model = Test::where('id', $id)->first();
        $request = new TestSearchRequest();

        if ($this->validation($request)) {
            $model->_save();

            $this->redirect('admin/test');
        } else
            return $this->render('test/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model]);
    }

    public function actionDelete()
    {
        $request = new TestSearchRequest();

        Test::where('id', $request->id)->delete();
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'title' => 'Название',
                'description' => 'Описание',
                '_status' => [
                    'label' => 'Статус',
                    'value' => function($model) {
                        if($model->status == 1)
                            return 'Активный';
                        elseif ($model->status == 0)
                            return GridViewHelper::div('Неактивный', 'inactive-field');
                        else
                            return '';
                    }
                ],
                '_time' => [
                    'label' => 'Время',
                    'value' => function($model) {
                        if($model->time == 0)
                            return 'Время не ограничено';
                        else
                            return $model->time;
                    }
                ],
//                'photo' => 'Картинка',
//                'created_at' => 'Created_at',
//                'updated_at' => 'Updated_at',
            ],
            'baseUri' => '/admin/test'
        ];
    }

    public function setQuestionsOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'question' => 'Вопрос',
                '_status' => [
                    'label' => 'Статус',
                    'value' => function($model) {
                        if($model->status == 1)
                            return 'Активный';
                        elseif ($model->status == 0)
                            return GridViewHelper::div('Неактивный', 'inactive-field');
                        else
                            return '';
                    }
                ],
                '_type' => [
                    'label' => 'Тип',
                    'value' => function($model) {
                        if($model->type == 1)
                            return 'Вопрос с одним ответом';
                        else
                            return '';
                    }
                ],
                'point' => 'Баллы',
//                'weight' => 'Вес',
//                'photo' => 'Картинка',
//                'test_id' => 'Test_id',
//                'created_at' => 'Created_at',
//                'updated_at' => 'Updated_at',
            ],
            'baseUri' => '/admin/question'
        ];
    }

    public function validation($request)
    {
        return isset($request->title) && isset($request->description) && isset($request->status) && isset($request->time);
    }
}