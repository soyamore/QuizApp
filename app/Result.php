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

class Result extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['question_id', 'answer_id', 'user_id', 'quiz_id', 'test_id'];

    public function getUser()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getAnswer()
    {
        return $this->belongsTo('App\Answer', 'answer_id');
    }

    public function getQuestion()
    {
        return $this->belongsTo('App\Question', 'question_id');
    }

    public function getQuiz()
    {
        return $this->belongsTo('App\Quiz', 'quiz_id');
    }

    public function getTest()
    {
        return $this->belongsTo('App\Test', 'test_id');
    }
}
