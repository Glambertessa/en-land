<?php


namespace workspace\modules\question\requests;


use core\RequestSearch;

/**
 * Class QuestionSearchRequest
 * @package workspace\modules\question\requests
 *
 * @property int unsigned id
 * @property string question
 * @property int status
 * @property string type
 * @property string weight
 * @property string point
 * @property string photo
 * @property string created_at
 * @property string updated_at
 */

class QuestionSearchRequest extends RequestSearch
{
    public $id;
    public $question;
    public $status;
    public $type;
    public $weight;
    public $point;
    public $photo;
    public $created_at;
    public $updated_at;

    public function rules()
    {
        return [];
    }
}