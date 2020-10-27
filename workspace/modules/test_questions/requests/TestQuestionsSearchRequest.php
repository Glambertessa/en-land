<?php


namespace workspace\modules\test_questions\requests;


use core\RequestSearch;

/**
 * Class TestQuestionsSearchRequest
 * @package workspace\modules\test_questions\requests
 *
 * @property int unsigned id
 * @property int unsigned test_id
 * @property int unsigned question_id
 */

class TestQuestionsSearchRequest extends RequestSearch
{
    public $id;
    public $test_id;
    public $question_id;


    public function rules()
    {
        return [];
    }
}