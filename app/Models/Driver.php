<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    // Allows us to mass-assign data to these columns safely
    protected $fillable = ['name', 'status'];

    /**
     * Relationship: A driver can have many orders.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
