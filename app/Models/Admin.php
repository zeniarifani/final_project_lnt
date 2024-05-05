<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_admin',
        'id_admin',
        'email_admin',
        'password_admin',
        'handphone_admin',
    ];
}
