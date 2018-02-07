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

class Test extends Model
{
    protected $fillable = ['quiz_id', 'user_id', 'score'];

    public function results()
    {
        return $this->hasMany('App\Result');
    }

    public function getName()
    {
        $user = User::find($this->user_id);

        return $user->name;
    }

    public function quiz()
    {
        return $this->belongsTo('App\Quiz');
    }

    public function examinee()
    {
        return $this->belongsTo('App\User');
    }
}
