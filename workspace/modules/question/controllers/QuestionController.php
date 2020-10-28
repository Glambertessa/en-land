<?php


namespace workspace\modules\question\controllers;


use core\App;
use core\Controller;
use core\Debug;
use workspace\modules\question\models\Question;
use workspace\modules\question\requests\QuestionSearchRequest;
use workspace\modules\test\models\Test;

class QuestionController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/question/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Question', 'url' => 'admin/question']);
    }

    public function actionIndex()
    {
        $request = new QuestionSearchRequest();
        $model = Question::search($request);

        return $this->render('question/index.tpl', ['h1' => 'Вопросы', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = Question::where('id', $id)->first();

        return $this->render('question/view.tpl', ['model' => $model, 'options' => $this->setOptions($model),
            'answers_options' => $this->setAnswersOptions($model->answers)]);
    }

    public function actionStore()
    {
        $tests = Test::all();

        if($this->validation()) {
            $model = new Question();
            $model->_save();

            $this->redirect('admin/test/');
        } else
            return $this->render('question/store.tpl', ['h1' => 'Добавить', 'tests' => $tests]);
    }

    public function actionEdit($id)
    {
        $model = Question::where('id', $id)->first();
        $tests = Test::all();

        if($this->validation()) {
            $model->_save();

            $this->redirect('admin/test/' . $model->test_id);
        } else
            return $this->render('question/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model, 'tests' => $tests]);
    }

    public function actionDelete()
    {
        Question::where('id', $_POST['id'])->delete();
    }

    public function setOptions($data)
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
//                'created_at' => 'Created_at',
//                'updated_at' => 'Updated_at',
            ],
            'baseUri' => 'question'
        ];
   }

    public function setAnswersOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
//                'id' => 'Id',
                'answer' => 'Ответ',
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
                            return 'Правлильный ответ';
                        elseif ($model->type == 0)
                            return 'Неправильный ответ';
                        else
                            return '';
                    }
                ],
//                'weight' => 'Вес',
                'point' => 'Баллы',
//                'photo' => 'Картинка',
//                'question_id' => 'Question_id',
//                'created_at' => 'Created_at',
//                'updated_at' => 'Updated_at',
            ],
            'baseUri' => 'answer'
        ];
    }

   public function validation()
   {
       return isset($_POST["question"]) && isset($_POST["status"]) && isset($_POST["type"]) && isset($_POST["point"]);
   }
}