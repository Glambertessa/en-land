<?php


namespace workspace\modules\answer\models;


use Illuminate\Database\Eloquent\Model;
use workspace\modules\answer\requests\AnswerSearchRequest;

class Answer extends Model
{
    protected $table = "answer";

    public $fillable = ['answer', 'status', 'type', 'weight', 'point', 'photo', 'question_id', 'created_at', 'updated_at'];

    public function _save()
    {
        $this->answer = $_POST["answer"];
        $this->status = $_POST["status"];
        $this->type = $_POST["type"];
        $this->weight = $_POST["weight"];
        $this->point = $_POST["point"];
        $this->photo = $_POST["photo"];
        $this->question_id = $_POST["question_id"];

        $this->save();
    }

    /**
     * @param AnswerSearchRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search(AnswerSearchRequest $request)
    {
        $query = self::query();

        if ($request->id)
            $query->where('id', 'LIKE', "%$request->id%");

        if ($request->answer)
            $query->where('answer', 'LIKE', "%$request->answer%");

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

        if ($request->question_id)
            $query->where('question_id', 'LIKE', "%$request->question_id%");

        if ($request->created_at)
            $query->where('created_at', 'LIKE', "%$request->created_at%");

        if ($request->updated_at)
            $query->where('updated_at', 'LIKE', "%$request->updated_at%");

        return $query->get();
    }
}