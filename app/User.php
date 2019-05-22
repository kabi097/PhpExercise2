<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active', 'banned', 'notifable_email', 'email', 'email_verified_at', 'avatar', 'votes', 'steam_id', 'facebook_id', 'google_id', 'geo', 'lang', 'votes', 'ref_status',
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

    public function referringUsers() {
        return $this->hasMany('App\User', 'id', 'ref');
    }

    public function referredUser() {
        return $this->hasOne('App\User', 'ref', 'id');
    }
}
