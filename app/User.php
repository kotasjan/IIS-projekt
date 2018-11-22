<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * @property mixed id
 * @property mixed isAdmin
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'dateOfBirth', 'phone', 'address', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'isAdmin',
    ];

    public function client() {
        return $this->hasOne(Client::class);
    }

    public function isEmployee() {

        return (Employee::find($this->id)) ? true : false;

    }
}
