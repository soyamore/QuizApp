<?php

/**
 *
 *   Author: Anass BOUTAKAOUA
 *   URI: https://github.com/soyamore
 *   Email: anass@itcours.com
 *
 */

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'username', 'email', 'password', 'type', 'cin' , 'tel', 'address', 'birthday', 'ecole', 'cv' , 'level_id', 'ville'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quizzes()
    {
        return $this->hasMany('App\Quiz');
    }

    public function tests()
    {
        return $this->hasMany('App\Test');
    }

    public function availableQuizzes()
    {
        return $this->belongsToMany('App\Quiz');
    }

    // CHECK IF IS AN ADMIN
    public function isAdmin()
    {
        return $this->type == 'admin';
    }


    // CHECK IF IS A HEAD HUNTER
    public function isHeadHunter()
    {
        return $this->type == 'headhunter';
    }

    // CHECK IF IS AN EXAMINEE
    public function isCandidat()
    {
        return $this->type == 'candidat';
    }


    public function limitReached($quiz_id)
    {
        $today = Test::where('quiz_id', $quiz_id)
            ->where('user_id', Auth::id())
            ->where('created_at', '>=', new \DateTime('today'))
            ->get();

        if ($this->isCandidat() && count($today) >= 3) {
            return true;
        }

        return false;
    }

    public function getTranslatedTypeAttribute()
    {
        if ($this->type == 'headhunter')
            return 'Head Hunter';
        else if ($this->type == 'candidat')
            return 'Candidat';
        return 'admin';
    }
}
