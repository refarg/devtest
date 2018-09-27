<?php

namespace App;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Auth\Authenticatable;
//use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
//use Illuminate\Auth\Passwords\CanResetPassword;
//use Illuminate\Contracts\Auth\CanResetPassword as CanResetPassword;

class User extends Authenticatable implements CanResetPassword
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'level',
    ];

    public function isAdmin()
{
    return $this->level; // this looks for an admin column in your users table
}

}
