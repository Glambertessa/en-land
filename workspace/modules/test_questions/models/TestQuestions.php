<?php


namespace workspace\modules\test_questions\models;


use Illuminate\Database\Eloquent\Model;
use workspace\modules\test_questions\requests\TestQuestionsSearchRequest;

class TestQuestions extends Model
{
    protected $table = "test_questions";

    public $fillable = ['test_id', 'question_id'];

    public function _save()
    {
            $this->test_id = $_POST["test_id"];
            $this->question_id = $_POST["question_id"];

        $this->save();
    }

    /**
     * @param TestQuestionsSearchRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search(TestQuestionsSearchRequest $request)
    {
        $query = self::query();

        if($request->id)
            $query->where('id', 'LIKE', "%$request->id%");

        if($request->test_id)
            $query->where('test_id', 'LIKE', "%$request->test_id%");

        if($request->question_id)
            $query->where('question_id', 'LIKE', "%$request->question_id%");


        return $query->get();
    }
}