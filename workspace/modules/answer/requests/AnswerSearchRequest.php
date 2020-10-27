<?php


namespace workspace\modules\answer\requests;


use core\RequestSearch;

/**
 * Class AnswerSearchRequest
 * @package workspace\modules\answer\requests
 *
 * @property int unsigned id
 * @property varchar(255) answer
 * @property int status
 * @property varchar(255) type
 * @property varchar(255) weight
 * @property varchar(255) point
 * @property varchar(255) photo
 * @property int unsigned question_id
 * @property timestamp created_at
 * @property timestamp updated_at
 */

class AnswerSearchRequest extends RequestSearch
{
    public $id;
    public $answer;
    public $status;
    public $type;
    public $weight;
    public $point;
    public $photo;
    public $question_id;
    public $created_at;
    public $updated_at;


    public function rules()
    {
        return [];
    }
}