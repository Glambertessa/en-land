<?php


namespace workspace\modules\answer\controllers;


use core\App;
use core\Controller;
use core\Debug;
use core\GridViewHelper;
use workspace\modules\answer\models\Answer;
use workspace\modules\answer\requests\AnswerSearchRequest;
use workspace\modules\question\models\Question;

class AnswerController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/answer/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Answer', 'url' => 'admin/answer']);
    }

    public function actionIndex()
    {
        $request = new AnswerSearchRequest();
        $model = Answer::search($request);

        return $this->render('answer/index.tpl', ['h1' => 'Ответы', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = Answer::where('id', $id)->first();

        $options = $this->setOptions($model);

        return $this->render('answer/view.tpl', ['model' => $model, 'options' => $options]);
    }

    public function actionStore()
    {
        $questions = Question::all();
        $request = new AnswerSearchRequest();

        $question = (isset($request->question_id)) ? Question::where('id', $request->question_id)->first() : Question::first();

        if($this->validation($request)) {
            $model = new Answer();
            $model->_save();

            $this->redirect('admin/question/' . $question->id);
        } else
            return $this->render('answer/store.tpl', ['h1' => 'Добавить', 'questions' => $questions, 'question_id' => $question->id]);
    }

    public function actionEdit($id)
    {
        $model = Answer::where('id', $id)->first();
        $request = new AnswerSearchRequest();

        $questions = Question::all();

        if($this->validation($request)) {
            $model->_save();

            $this->redirect('admin/question/' . $_POST['question_id']);
        } else
            return $this->render('answer/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model, 'questions' => $questions]);
    }

    public function actionDelete()
    {
        Answer::where('id', $_POST['id'])->delete();
    }

    public function setOptions($data)
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
//                'weight' => 'Weight',
                'point' => 'Баллы',
//                'photo' => 'Photo',
//                'question_id' => 'Question_id',
//                'created_at' => 'Created_at',
//                'updated_at' => 'Updated_at',
            ],
            'baseUri' => '/admin/answer'
        ];
   }

   public function validation($request)
   {
       return isset($request->answer) && isset($request->status) && isset($request->type) && isset($request->point);
   }
}