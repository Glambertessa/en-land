<?php


namespace workspace\modules\test\controllers;


use core\App;
use core\Controller;
use core\GridViewHelper;
use workspace\modules\result\models\Result;
use workspace\modules\test\models\Test;
use workspace\modules\test\requests\TestSearchRequest;
use workspace\modules\test_questions\models\TestQuestions;

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
            'questions_options' => $this->setQuestionsOptions($model->questions),
            'results_options' => $this->setResultsOptions($model->results)]);
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

        TestQuestions::where('test_id', $request->id)->delete();
        Result::where('test_id', $request->id)->delete();
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
                         return ($model->time == 0) ? 'Время не ограничено' : $model->time;
                    }
                ],
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
                        return ($model->type == 1) ? 'Вопрос с одним ответом' : '';
                    }
                ],
                'point' => 'Баллы',
            ],
            'baseUri' => '/admin/question'
        ];
    }

    public function setResultsOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'min_score' => 'Min',
                'max_score' => 'Max',
                'title' => 'Заголовок',
                'description' => 'Описание',
            ],
            'baseUri' => '/admin/result'
        ];
    }

    public function validation($request)
    {
        return isset($request->title) && isset($request->description) && isset($request->status) && isset($request->time);
    }
}