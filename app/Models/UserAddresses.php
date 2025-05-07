<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number_1',
        'phone_number_2',
        'country',
        'city',
        'postal_code',
        'street',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
