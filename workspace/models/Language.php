<?php


namespace workspace\models;


use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = "language";

    public $fillable = ['name'];
}