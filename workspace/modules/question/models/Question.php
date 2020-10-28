<?php


namespace workspace\modules\question\models;


use Illuminate\Database\Eloquent\Model;
use workspace\modules\question\requests\QuestionSearchRequest;
use workspace\modules\test_questions\models\TestQuestions;

class Question extends Model
{
    protected $table = "question";

    public $fillable = ['question', 'status', 'type', 'weight', 'point', 'photo', 'created_at', 'updated_at'];

    public function _save()
    {
        $this->question = $_POST["question"];
        $this->status = $_POST["status"];
        $this->type = $_POST["type"];
        $this->weight = $_POST["weight"];
        $this->point = $_POST["point"];
        $this->photo = $_POST["photo"];

        $this->save();

        $testQuestion = new TestQuestions();
        $testQuestion->test_id = $_POST["test_id"];
        $testQuestion->question_id = $this->id;
        $testQuestion->save();
    }

    /**
     * @param QuestionSearchRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search(QuestionSearchRequest $request)
    {
        $query = self::query();

        if ($request->id)
            $query->where('id', 'LIKE', "%$request->id%");

        if ($request->question)
            $query->where('question', 'LIKE', "%$request->question%");

        if ($request->status)
            $query->where('status', 'LIKE', "%$request->status%");

        if ($request->type)
            $query->where('type', 'LIKE', "%$request->type%");

        if ($request->weight)
            $query->where('weight', 'LIKE', "%$request->weight%");

        if ($request->point)
            $query->where('point', 'LIKE', "%$request->point%");

        if ($request->photo)
            $query->where('photo', 'LIKE', "%$request->photo%");

        if ($request->created_at)
            $query->where('created_at', 'LIKE', "%$request->created_at%");

        if ($request->updated_at)
            $query->where('updated_at', 'LIKE', "%$request->updated_at%");


        return $query->get();
    }

    public function answers()
    {
        return $this->hasMany('workspace\modules\answer\models\Answer');
    }

    public function tests()
    {
        return $this->belongsToMany('workspace\modules\question\models\Question', 'test_questions');
    }
}