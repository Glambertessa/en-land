<?php


namespace workspace\modules\test\requests;


use core\RequestSearch;

/**
 * Class TestSearchRequest
 * @package workspace\modules\test\requests
 *
 * @property int unsigned id
 * @property varchar(255) title
 * @property text description
 * @property int status
 * @property int time
 * @property varchar(255) photo
 * @property timestamp created_at
 * @property timestamp updated_at
 */

class TestSearchRequest extends RequestSearch
{
    public $id;
    public $title;
    public $description;
    public $status;
    public $time;
    public $photo;
    public $created_at;
    public $updated_at;


    public function rules()
    {
        return [];
    }
}