<?php 

/**
 *
 *   Author: Anass BOUTAKAOUA
 *   URI: https://github.com/soyamore
 *   Email: anass@itcours.com
 *
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    protected $fillable = ['text', 'quiz_id'];

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function correctAnswer()
    {
        foreach ($this->answers as $answer)
        {
            if ($answer->correct) return $answer;
        }

        return null;
    }
}
