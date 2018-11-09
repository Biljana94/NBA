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
        'name', 'email', 'password', 'is_verified', 'verification_code'
    ];


    //validaciona pravila koja cemo koristiti u RegisterController.php
    const VALIDATION_RULES = [
        'name' => 'required|min:3|max:30',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed:password_confirmation|min:6',
        'password_confirmation' => ''
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
}
