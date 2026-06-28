<?php

namespace App\Models\F5;

use Illuminate\Database\Eloquent\Model;

class F5Pool extends Model
{
    protected $fillable = [
        'device_id',
        'pool_name',
        'partition',
        'lb_method',
        'monitor',
        'availability',
        'enabled_state',
        'raw_json',
    ];

    protected $casts = [
        'raw_json' => 'array',
    ];

    public function device()
    {
        return $this->belongsTo(F5Device::class, 'device_id');
    }

    public function members()
    {
        return $this->hasMany(F5PoolMember::class, 'pool_id');
    }
}