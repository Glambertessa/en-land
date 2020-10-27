<?php


namespace workspace\modules\test\controllers;


use core\App;
use core\Controller;
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

        return $this->render('test/index.tpl', ['h1' => 'Test', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = Test::where('id', $id)->first();
        $questions = Test::find(1)->questions()->get();

        return $this->render('test/view.tpl', ['model' => $model, 'options' => $this->setOptions($model),
            'questions_options' => $this->setQuestionsOptions($questions)]);
    }

    public function actionStore()
    {
        if ($this->validation()) {
            $model = new Test();
            $model->_save();

            $this->redirect('admin/test');
        } else
            return $this->render('test/store.tpl', ['h1' => 'Добавить']);
    }

    public function actionEdit($id)
    {
        $model = Test::where('id', $id)->first();

        if ($this->validation()) {
            $model->_save();

            $this->redirect('admin/test');
        } else
            return $this->render('test/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model]);
    }

    public function actionDelete()
    {
        Test::where('id', $_POST['id'])->delete();
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
//                'id' => 'Id',
                'title' => 'Название',
                'description' => 'Описание',
                '_status' => [
                    'label' => 'Статус',
                    'value' => function($model) {
                        if($model->status == 1)
                            return 'Активный';
                        elseif ($model->status == 0)
                            return 'Неактивный';
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
//                'id' => 'Id',
                'question' => 'Вопрос',
                '_status' => [
                    'label' => 'Статус',
                    'value' => function($model) {
                        if($model->status == 1)
                            return 'Активный';
                        elseif ($model->status == 0)
                            return 'Неактивный';
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
//                'weight' => 'Вес',
                'point' => 'Баллы',
//                'photo' => 'Картинка',
//                'test_id' => 'Test_id',
//                'created_at' => 'Created_at',
//                'updated_at' => 'Updated_at',
            ],
            'baseUri' => '/admin/question'
        ];
    }

    public function validation()
    {
        return isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["status"]) && isset($_POST["time"]) && isset($_POST["photo"]);
    }
}