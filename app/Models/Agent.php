<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agent extends Authenticatable
{
    //

    use Notifiable;

    protected $fillable = [
        'admin_id',
        'name',
        'email',
        'phone',
        'address',
        'password',
        'remember_token'
    ];

    protected $hidden = [
        'password',
    ];

    public function admin() {
        return $this->belongsTo(Admin::class);
    }
}
