<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'driver_id', 'price', 'status'];

    /**
     * Relationship: An order belongs to a specific user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: An order belongs to a specific driver/captain.
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
