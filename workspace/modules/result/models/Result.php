<?php


namespace workspace\modules\result\models;


use Illuminate\Database\Eloquent\Model;
use workspace\modules\result\requests\ResultSearchRequest;

class Result extends Model
{
    protected $table = "result";

    public $fillable = ['min_score', 'max_score', 'title', 'description', 'photo', 'test_id', 'created_at', 'updated_at'];

    public function _save()
    {
            $this->min_score = $_POST["min_score"];
            $this->max_score = $_POST["max_score"];
            $this->title = $_POST["title"];
            $this->description = $_POST["description"];
            $this->photo = $_POST["photo"];
            $this->test_id = $_POST["test_id"];

        $this->save();
    }

    /**
     * @param ResultSearchRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search(ResultSearchRequest $request)
    {
        $query = self::query();

        if($request->id)
            $query->where('id', 'LIKE', "%$request->id%");

        if($request->min_score)
            $query->where('min_score', 'LIKE', "%$request->min_score%");

        if($request->max_score)
            $query->where('max_score', 'LIKE', "%$request->max_score%");

        if($request->title)
            $query->where('title', 'LIKE', "%$request->title%");

        if($request->description)
            $query->where('description', 'LIKE', "%$request->description%");

        if($request->photo)
            $query->where('photo', 'LIKE', "%$request->photo%");

        if($request->test_id)
            $query->where('test_id', 'LIKE', "%$request->test_id%");

        if($request->created_at)
            $query->where('created_at', 'LIKE', "%$request->created_at%");

        if($request->updated_at)
            $query->where('updated_at', 'LIKE', "%$request->updated_at%");


        return $query->get();
    }
}