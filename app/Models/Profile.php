<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [

        'id', 'name_surname', 'phone', 'email', 'address', 'about', 'link', 'edu1', 'edu2', 'exp', 'skills',
    ];
}
