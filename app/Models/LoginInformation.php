<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginInformation extends Model
{
    use HasFactory;

    protected $table = 'login_informations';
    protected $fillable = [
        'user_id',
    ];
}
