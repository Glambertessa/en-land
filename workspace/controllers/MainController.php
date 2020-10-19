<?php

namespace workspace\controllers;

use core\App;
use core\component_manager\lib\Mod;
use core\Controller;
use core\Debug;
use workspace\modules\customer\models\Customer;
use workspace\modules\settings\models\Settings;
use workspace\modules\users\models\User;
use workspace\requests\LoginRequest;
use workspace\requests\RegistrationRequest;
use workspace\widgets\Language;


class MainController extends Controller
{
    public function actionIndex()
    {
        $this->view->setTitle('Английский');
        $this->setLayout('front.tpl');

        $standard_price = Settings::where('key', 'standard_price')->first();
        $advanced_price = Settings::where('key', 'advanced_price')->first();
        $standard_left = Settings::where('key', 'standard_left')->first();
        $advanced_left = Settings::where('key', 'advanced_left')->first();
        $social = Settings::where('key', 'Vk')->orWhere('key', 'Whatsapp')->get();

        return $this->render('main/index.tpl', ['standard_price' => $standard_price->value,
            'advanced_price' => $advanced_price->value, 'standard_left' => $standard_left->value,
            'advanced_left' => $advanced_left->value, 'social' => $social]);
    }

    public function actionAddOrder()
    {
        $customer = new Customer();
        $customer->_save();

        $this->redirect('');
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

            $this->redirect('');
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

                    $this->redirect('');
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