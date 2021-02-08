<?php

namespace workspace\controllers;

use core\App;
use core\component_manager\lib\Mod;
use core\Controller;
use core\Debug;
use workspace\modules\answer\models\AnswerResult;
use workspace\modules\course\models\Course;
use workspace\modules\customer\models\Customer;
use workspace\modules\result\models\Result;
use workspace\modules\settings\models\Settings;
use workspace\modules\test\models\Test;
use workspace\modules\test\models\TestResult;
use workspace\modules\users\models\User;
use workspace\requests\LoginRequest;
use workspace\requests\RegistrationRequest;
use workspace\widgets\Language;


class MainController extends Controller
{
    public function actionIndex()
    {
        $this->setLayout('front.tpl');
        $this->view->setTitle(Settings::where('key', 'title')->first()->value);
        $this->view->addMeta('description', Settings::where('key', 'description')->first()->value);

        $og_tags = Settings::where('label', 'og_meta_tag')->get();
        foreach ($og_tags as $og_tag)
            $this->view->addMeta($og_tag->key, $og_tag->value, [], ['attribute_name' => 'property']);

        $standard_price = Settings::where('key', 'standard_price')->first();
        $advanced_price = Settings::where('key', 'advanced_price')->first();
        $individual_price = Settings::where('key', 'individual_price')->first();
        $standard_left = Settings::where('key', 'standard_left')->first();
        $advanced_left = Settings::where('key', 'advanced_left')->first();
        $social = Settings::where('label', 'social')->get();
        $h1 = Settings::where('key', 'h1')->first();

        $corses = Course::all()->toArray();

        return $this->render('main/index.tpl', ['standard_price' => $standard_price->value,
            'advanced_price' => $advanced_price->value, 'individual_price' => $individual_price->value,
            'standard_left' => $standard_left->value, 'advanced_left' => $advanced_left->value, 'social' => $social,
            'h1' => $h1->value, 'courses' => $corses]);
    }

    public function actionTest()
    {
        $this->setLayout('front.tpl');
        $this->view->setTitle(Settings::where('key', 'test_title')->first()->value);
        $this->view->addMeta('description', Settings::where('key', 'test_description')->first()->value);

        $og_tags = Settings::where('label', 'og_meta_tag')->get();
        foreach ($og_tags as $og_tag)
            $this->view->addMeta($og_tag->key, $og_tag->value, [], ['attribute_name' => 'property']);

        $test = Test::where('title', 'Экспресс-тест на определение уровня')->first();
        $social = Settings::where('label', 'social')->get();

        return $this->render('main/test.tpl', ['test' => $test, 'social' => $social]);
    }

    public function actionTestHandler()
    {
        $data = json_decode($_POST['data']);
        $test = Test::where('id', $data->test)->first();
        $score = 0;
        $answers = [];

        foreach ($test->questions as $question) {
            $question_id = $question->id;

            $answer_result = new AnswerResult();
            $answer_result->question_id = $question_id;

            foreach ($question->answers as $answer) {
                if($data->$question_id == $answer->id) {
                    $score += $answer->point;
                    $answer_result->chosen_answer_id = $answer->id;
                }
                if($answer->point != 0)
                    $answer_result->right_answer_id = $answer->id;
            }
            array_push($answers, $answer_result);
        }

        $result = Result::where([['min_score', '<=', $score],['max_score', '>=', $score]])->first();

        $test_result = new TestResult();
        $test_result->score = $score;
        $test_result->result = $result;
        $test_result->answers = $answers;

        return json_encode($test_result);
    }

    public function actionAddOrder()
    {
        $data = json_decode($_POST['data']);

        $customer = new Customer();
        return $customer->_save($data);
    }

    public function actionShowTest()
    {
        $data = json_decode($_POST['data']);

        $customer = new Customer();
        return $customer->_save($data);
    }

    public function actionGetVocabulary()
    {
        $data = json_decode($_POST['data']);

        $customer = new Customer();
        return $customer->_save($data);
    }

    public function actionLanguage()
    {
        Language::widget()->run();
    }

    public function actionSignUp()
    {
        $this->view->setTitle('Sign Up');

        $request = new RegistrationRequest();

        if ($request->isPost() && $request->validate()) {
            $model = new User();
            $model->_save($request);

            $_SESSION['role'] = $model->role;
            $_SESSION['username'] = $model->username;

            $this->redirect('admin');
        }
        return $this->render('main/sign-up.tpl', ['errors' => $request->getMessagesArray()]);
    }

    public function actionSignIn()
    {
        $this->view->setTitle('Sign In');

        $mod = new Mod();
        if ($mod->getModInfo('users')['status'] != 'active') {
            $message = 'Чтобы сделать доступной регистрацию и авторизацию установите и активируйте модуль пользователей.';

            return $this->render('main/info.tpl', ['message' => $message]);
        } else {
            $request = new LoginRequest();
            if ($request->isPost() && $request->validate()) {
                $model = User::where('username', $request->username)->first();

                if (password_verify($request->password, $model->password_hash)) {
                    $_SESSION['role'] = $model->role;
                    $_SESSION['username'] = $model->username;

                    $this->redirect('admin');
                }
            }
            return $this->render('main/sign-in.tpl', ['errors' => $request->getMessagesArray()]);
        }
    }

    public function actionLogout()
    {
        session_destroy();
        $this->redirect('');
    }
}