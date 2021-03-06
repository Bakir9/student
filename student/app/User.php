<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Permission\HasPermissionsTrait;

class User extends Authenticatable
{
    use Notifiable;
    use HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','e_mail','phone','username','password','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogs()
    {   //strani kljuc u tabeli Blog od tabele User
        return $this->hasMany('App\Blog');
    }

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    public function polls()
    {
        return $this->hasMany('App\Poll');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role','users_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission','users_permissions','user_id','permission_id');
    }

    
}
