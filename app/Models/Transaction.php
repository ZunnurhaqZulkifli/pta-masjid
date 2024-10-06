<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'reason',
        'amount',
        'reference_number',
        'user_id',
        'payment_id',
        'payment_type_id',
        'payment_status_id',
        'project_id',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function status()
    {
        return $this->belongsTo(PaymentStatus::class);
    }

    public function method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
