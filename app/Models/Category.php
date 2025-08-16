<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     use HasFactory;

    protected $fillable = [
        'vendor_id',
        'name',
    ];

    /**
     * Relasi ke Vendor (Many-to-One)
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    /**
     * Relasi ke Training (One-to-Many)
     */
    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
}
