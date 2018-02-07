<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name'];

    public function quizzes()
    {
        return $this->hasMany('App\Quiz');
    }
}
