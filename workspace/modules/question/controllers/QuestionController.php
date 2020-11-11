<?php


namespace workspace\modules\question\controllers;


use core\App;
use core\Controller;
use core\Debug;
use core\GridViewHelper;
use workspace\modules\answer\models\Answer;
use workspace\modules\question\models\Question;
use workspace\modules\question\requests\QuestionSearchRequest;
use workspace\modules\test\models\Test;
use workspace\modules\test_questions\models\TestQuestions;

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
        $request = new QuestionSearchRequest();

        if($this->validation($request)) {
            $model = new Question();
            $model->_save();

            $this->redirect('admin/test/' . $request->test_id);
        } else
            return $this->render('question/store.tpl', ['h1' => 'Добавить', 'tests' => $tests,
                'test_id' => $request->test_id]);
    }

    public function actionEdit($id)
    {
        $model = Question::where('id', $id)->first();
        $tests = Test::all();
        $request = new QuestionSearchRequest();

        if($this->validation($request)) {
            $model->_save();

            $this->redirect('admin/test/' . $request->test_id);
        } else
            return $this->render('question/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model, 'tests' => $tests]);
    }

    public function actionDelete()
    {
        $request = new QuestionSearchRequest();

        TestQuestions::where('question_id', $request->id)->delete();
        Answer::where('question_id', $request->id)->delete();
        Question::where('id', $request->id)->delete();
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
//                'weight' => 'Вес',
                'point' => 'Баллы',
//                'photo' => 'Картинка',
//                'created_at' => 'Created_at',
//                'updated_at' => 'Updated_at',
            ],
            'baseUri' => '/admin/question'
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
                            return GridViewHelper::div('Неактивный', 'inactive-field');
                        else
                            return '';
                    }
                ],
                '_type' => [
                    'label' => 'Тип',
                    'value' => function($model) {
                        if($model->type == 1)
                            return GridViewHelper::div('Правильный ответ', 'right-answer');
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
            'baseUri' => '/admin/answer'
        ];
    }

   public function validation($request)
   {
       return isset($request->question) && isset($request->status) && isset($request->type) && isset($request->point);
   }
}