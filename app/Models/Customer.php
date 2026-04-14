<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

    protected $fillable = [
        'agent_id',
        'name',
        'email',
        'phone',
        'address'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
