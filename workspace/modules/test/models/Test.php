<?php


namespace workspace\modules\test\models;


use core\Debug;
use Illuminate\Database\Eloquent\Model;
use workspace\modules\test\requests\TestSearchRequest;

class Test extends Model
{
    protected $table = "test";

    public $fillable = ['title', 'description', 'status', 'time', 'photo', 'created_at', 'updated_at'];

    public function _save()
    {
        $this->title = $_POST["title"];
        $this->description = $_POST["description"];
        $this->status = $_POST["status"];
        $this->time = $_POST["time"];
        $this->photo = $_POST["photo"];

        $this->save();
    }

    /**
     * @param TestSearchRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search(TestSearchRequest $request)
    {
        $query = self::query();

        if ($request->id)
            $query->where('id', 'LIKE', "%$request->id%");

        if ($request->title)
            $query->where('title', 'LIKE', "%$request->title%");

        if ($request->description)
            $query->where('description', 'LIKE', "%$request->description%");

        if ($request->status)
            $query->where('status', 'LIKE', "%$request->status%");

        if ($request->time)
            $query->where('time', 'LIKE', "%$request->time%");

        if ($request->photo)
            $query->where('photo', 'LIKE', "%$request->photo%");

        if ($request->created_at)
            $query->where('created_at', 'LIKE', "%$request->created_at%");

        if ($request->updated_at)
            $query->where('updated_at', 'LIKE', "%$request->updated_at%");


        return $query->get();
    }

    public function questions()
    {
        return $this->belongsToMany('workspace\modules\question\models\Question', 'test_questions');
    }

    public function results()
    {
        return $this->hasMany('workspace\modules\result\models\Result');
    }
}