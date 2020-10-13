<?php


namespace workspace\modules\settings\models;


use Illuminate\Database\Eloquent\Model;
use workspace\modules\settings\requests\SettingsSearchRequest;

class Settings extends Model
{
    protected $table = "settings";

    public $fillable = ['key', 'value'];

    /**
     * @param SettingsSearchRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search(SettingsSearchRequest $request)
    {
        $query = self::query();

        if ($request->key)
            $query->where('key', 'LIKE', "%$request->key%");

        if ($request->value)
            $query->where('value', 'LIKE', "%$request->value%");

        return $query->get();
    }
}