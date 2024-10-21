<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    protected $guarded = ['id'];

    protected $table = 'user_payment';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
