<?php


namespace workspace\modules\settings\models;


use Illuminate\Database\Eloquent\Model;
use workspace\modules\settings\requests\SettingsSearchRequest;

class Settings extends Model
{
    protected $table = "settings";

    public $fillable = ['key', 'value', 'label'];

    /**
     * @param SettingsSearchRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search(SettingsSearchRequest $request)
    {
        $query = self::query();
        
        if ($request->label !== 'keyword')
            $query->where('label', '!=', 'keyword');

        if ($request->key)
            $query->where('key', 'LIKE', "%$request->key%");

        if ($request->value)
            $query->where('value', 'LIKE', "%$request->value%");

        if ($request->label)
            $query->where('label', 'LIKE', "%$request->label%");



        return $query->get();
    }

    /**
     * Making slug
     *
     * @param $string
     * @return false|string
     */
    public static function makeSlug($string)
    {
        return $slug = \Transliterator::createFromRules(
            ':: Any-Latin;'
            . ':: NFD;'
            . ':: [:Nonspacing Mark:] Remove;'
            . ':: NFC;'
            . ':: [:Punctuation:] Remove;'
            . ':: Lower();'
            . '[:Separator:] > \'-\''
        )
            ->transliterate($string);
    }


    public static function getKeywords(): string
    {
        $keywords = Settings::where('label', 'keyword')->get();
        $keywords_to_string = '';

        foreach ($keywords as $keyword) {
            $keywords_to_string .= $keyword->value . ',';
        }

        return $keywords_to_string;
    }
}