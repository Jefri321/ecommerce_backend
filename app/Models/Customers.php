<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Customers extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'password',
        'gender',
        'address',
        'certificate_address',
        'company',
        'profile_photo',
    ];
}
