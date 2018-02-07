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

class Quiz extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['subject', 'commentaire', 'time', 'category_id', 'user_id'];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function examinees()
    {
        return $this->belongsToMany('App\User');
    }

    public function tests()
    {
        return $this->hasMany('App\Test');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

}
