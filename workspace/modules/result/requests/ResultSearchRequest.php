<?php


namespace workspace\modules\result\requests;


use core\RequestSearch;

/**
 * Class ResultSearchRequest
 * @package workspace\modules\result\requests
 *
 * @property int unsigned id
 * @property int min_score
 * @property int max_score
 * @property varchar(255) title
 * @property text description
 * @property varchar(255) photo
 * @property int unsigned test_id
 * @property timestamp created_at
 * @property timestamp updated_at
 */

class ResultSearchRequest extends RequestSearch
{
    public $id;
    public $min_score;
    public $max_score;
    public $title;
    public $description;
    public $photo;
    public $test_id;
    public $created_at;
    public $updated_at;


    public function rules()
    {
        return [];
    }
}