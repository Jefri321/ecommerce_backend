<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'training_id',
        'price',
        'status',
        'user_name',
        'user_email',
        'user_phone',
        'certificate_address',
        'company',
        'gender',
        'uuid'
    ];

    // Generate UUID otomatis saat creating
    protected static function booted()
    {
        static::creating(function ($order) {
            if (empty($order->uuid)) {
                $order->uuid = (string) Str::uuid();
            }
        });
    }

    /**
     * Relasi ke Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relasi ke Training
     */
    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
