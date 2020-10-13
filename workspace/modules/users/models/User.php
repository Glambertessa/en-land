<?php


namespace workspace\modules\users\models;


use Illuminate\Database\Eloquent\Model;
use workspace\modules\users\requests\UsersSearchRequest;

class User extends Model
{
    protected $table = "user";

    public $fillable = ['username', 'email', 'role', 'password_hash'];

    /**
     * @param UsersSearchRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search(UsersSearchRequest $request)
    {
        $query = self::query();

        if ($request->username)
            $query->where('username', 'LIKE', "%$request->username%");

        if ($request->email)
            $query->where('email', 'LIKE', "%$request->email%");

        if ($request->role)
            $query->where('role', 'LIKE', "$request->role");

        return $query->get();
    }

    public static function getCurrentUserName()
    {
        return $_SESSION['username'] ?? null;
    }

    public function _save($request)
    {
        $this->username = $request->username;
        $this->email = $request->email;
        $this->role = 2;
        $this->password_hash = password_hash($request->password, PASSWORD_DEFAULT);
        $this->save();
    }
}