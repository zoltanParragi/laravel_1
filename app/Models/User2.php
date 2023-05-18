<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User2 extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];
    // OR protected $fillable = ['name', 'email', 'password'];

    function setPasswordAttribute($data) {
        $this->attributes['password'] = Hash::make($data);
    } 
    
    function setPostsJsonAttribute($posts_array) {
        $this->attributes['posts_json'] = json_encode($posts_array);
    }

    function getPostsJsonAttribute() {
        return json_decode($this->attributes['posts_json']);
    }

    function getFormattedSalaryAttribute() {
    //  number_format: szám, tizedes kerekítés 0, tizedes szeparátor karakter nincs, ezres szeparátor: szóköz
        return number_format($this->attributes['salary'], 0, '', ' ').' Ft';
    }
}
