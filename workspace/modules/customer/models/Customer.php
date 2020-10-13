<?php


namespace workspace\modules\customer\models;


use Illuminate\Database\Eloquent\Model;
use workspace\modules\customer\requests\CustomerSearchRequest;

class Customer extends Model
{
    protected $table = "customer";

    public $fillable = ['name', 'phone', 'social_network', 'created_at', 'updated_at'];

    public function _save()
    {
        $this->name = (isset($_POST["name"])) ? $_POST["name"] : 'empty';
        $this->phone = $_POST["phone"];
        $this->social_network = $_POST["social_network"];

        $this->save();
    }

    /**
     * @param CustomerSearchRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search(CustomerSearchRequest $request)
    {
        $query = self::query();

        if ($request->id)
            $query->where('id', 'LIKE', "%$request->id%");

        if ($request->name)
            $query->where('name', 'LIKE', "%$request->name%");

        if ($request->phone)
            $query->where('phone', 'LIKE', "%$request->phone%");

        if ($request->social_network)
            $query->where('social_network', 'LIKE', "%$request->social_network%");

        if ($request->created_at)
            $query->where('created_at', 'LIKE', "%$request->created_at%");

        if ($request->updated_at)
            $query->where('updated_at', 'LIKE', "%$request->updated_at%");


        return $query->get();
    }
}