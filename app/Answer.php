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

class Answer extends Model
{
    public $timestamps = false;
    protected $fillable = ['text', 'correct', 'question_id'];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
