<?php


namespace workspace\modules\course\models;


use Illuminate\Database\Eloquent\Model;
use workspace\modules\Course\requests\CourseSearchRequest;

class Course extends Model
{
    protected $table = "course";

    public $fillable = ['title', 'price', 'options', 'place_left'];

    /**
     * @param CourseSearchRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search(CourseSearchRequest $request)
    {
        $query = self::query();

        if ($request->title)
            $query->where('title', 'LIKE', "%$request->title%");

        if ($request->price)
            $query->where('price', 'LIKE', "%$request->price%");

        if ($request->options)
            $query->where('options', 'LIKE', "%$request->options%");

        if ($request->place_left)
            $query->where('place_left', 'LIKE', "%$request->place_left%");

        return $query->get();
    }
}