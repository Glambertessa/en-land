<?php


namespace workspace\modules\question\controllers;


use core\App;
use core\Controller;
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

        return $this->render('question/index.tpl', ['h1' => 'Question', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = Question::where('id', $id)->first();
        $answers = Question::find(1)->answers;

        $options = $this->setOptions($model);

        return $this->render('question/view.tpl', ['model' => $model, 'options' => $options, 'answers' => $answers,
            'answers_options' => $this->setAnswersOptions($answers)]);
    }

    public function actionStore()
    {
        $tests = Test::all();

        if($this->validation()) {
            $model = new Question();
            $model->_save();

            $this->redirect('admin/test/' . $model->test_id);
        } else
            return $this->render('question/store.tpl', ['h1' => 'Добавить', 'tests' => $tests]);
    }

    public function actionEdit($id)
    {
        $model = Question::where('id', $id)->first();

        if($this->validation()) {
            $model->_save();

            $this->redirect('admin/test/' . $model->test_id);
        } else
            return $this->render('question/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model]);
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
                'id' => 'Id',
                'question' => 'Question',
                'status' => 'Status',
                'type' => 'Type',
                'weight' => 'Weight',
                'point' => 'Point',
                'photo' => 'Photo',
                'created_at' => 'Created_at',
                'updated_at' => 'Updated_at',
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
                'id' => 'Id',
                'answer' => 'Answer',
                'status' => 'Status',
                'type' => 'Type',
                'weight' => 'Weight',
                'point' => 'Point',
                'photo' => 'Photo',
                'question_id' => 'Question_id',
                'created_at' => 'Created_at',
                'updated_at' => 'Updated_at',
            ],
            'baseUri' => 'answer'
        ];
    }

   public function validation()
   {
       return isset($_POST["question"]) && isset($_POST["status"]) && isset($_POST["type"]) && isset($_POST["weight"]) && isset($_POST["point"]) && isset($_POST["photo"]);
   }
}