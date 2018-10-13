<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable; //untuk autentifikasi
// use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    protected $table = "admin";
    protected $fillable = ['name', 'username', 'email', 'password'];
    // protected $hidden = ['passwordd'];
}
