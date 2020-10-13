<?php


namespace workspace\requests;


use core\Request;

/**
 * Class LoginRequest
 * @package workspace\requests
 * @property string $username
 * @property string $password
 */
class LoginRequest extends Request
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required|min:6',
        ];
    }

}