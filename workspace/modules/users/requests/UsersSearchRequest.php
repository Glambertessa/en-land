<?php


namespace workspace\modules\users\requests;


use core\RequestSearch;

/**
 * Class UsersSearchRequest
 * @package workspace\modules\users\requests
 *
 * @property string $username
 * @property string $email
 * @property integer $role
 */

class UsersSearchRequest extends RequestSearch
{
    public $username;
    public $email;
    public $role;

    public function rules()
    {
        return [];
    }

}