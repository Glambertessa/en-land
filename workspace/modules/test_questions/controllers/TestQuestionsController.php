<?php


namespace workspace\modules\test_questions\controllers;


use core\App;
use core\Controller;
use workspace\modules\test\models\Test;
use workspace\modules\question\models\Question;
use workspace\modules\test_questions\models\TestQuestions;
use workspace\modules\test_questions\requests\TestQuestionsSearchRequest;

class TestQuestionsController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/test_questions/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'TestQuestions', 'url' => 'admin/test-questions']);
    }

    public function actionIndex()
    {
        $request = new TestQuestionsSearchRequest();
        $model = TestQuestions::search($request);

        return $this->render('test_questions/index.tpl', ['h1' => 'TestQuestions', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = TestQuestions::where('id', $id)->first();

        $options = $this->setOptions($model);

        return $this->render('test_questions/view.tpl', ['model' => $model, 'options' => $options]);
    }

    public function actionStore()
    {
        $tests = Test::all();
        $questions = Question::all();

        if($this->validation()) {
            $model = new TestQuestions();
            $model->_save();

            $this->redirect('admin/test-questions');
        } else
            return $this->render('test_questions/store.tpl', ['h1' => 'Добавить',
                'tests' => $tests, 'questions' => $questions]);
    }

    public function actionEdit($id)
    {
        $model = TestQuestions::where('id', $id)->first();
        $tests = Test::where('id', $model->test_id)->get();
        $questions = Question::where('id', $model->question_id)->get();

        if($this->validation()) {
            $model->_save();

            $this->redirect('admin/test-questions');
        } else
            return $this->render('test_questions/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model,
                'tests' => $tests, 'questions' => $questions]);
    }

    public function actionDelete()
    {
        TestQuestions::where('id', $_POST['id'])->delete();
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
//                'id' => 'Id',
                'test_id' => 'Test_id',
                'question_id' => 'Question_id',
            ],
            'baseUri' => 'test-questions'
        ];
   }

   public function validation()
   {
       return isset($_POST["test_id"]) && isset($_POST["question_id"]);
   }
}