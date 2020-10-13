<?php


namespace workspace\modules\customer\requests;


use core\RequestSearch;

/**
 * Class CustomerSearchRequest
 * @package workspace\modules\customer\requests
 *
 * @property int id
 * @property varchar(255) name
 * @property varchar(255) phone
 * @property varchar(255) social_network
 * @property timestamp created_at
 * @property timestamp updated_at
 */

class CustomerSearchRequest extends RequestSearch
{
    public $id;
    public $name;
    public $phone;
    public $social_network;
    public $created_at;
    public $updated_at;


    public function rules()
    {
        return [];
    }
}