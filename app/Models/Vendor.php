<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
  use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    public function trainnings()
    {
        return $this->hasMany(Training::class);
    }
    public function categories() {
        return $this->belongsToMany(Category::class, 'vendor_category', 'vendor_id', 'category_id');
    }
}
