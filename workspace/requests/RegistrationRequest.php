<?php


namespace workspace\requests;


use core\Request;

/**
 * Class RegistrationRequest
 * @package workspace\requests
 * @property string $username
 * @property string $email
 * @property string $password
 */
class RegistrationRequest extends Request
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

}