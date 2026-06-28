<?php

namespace App\Models\F5;

use Illuminate\Database\Eloquent\Model;

class F5PoolMember extends Model
{
    protected $fillable = [
        'device_id',
        'pool_id',
        'member_name',
        'member_ip',
        'member_port',
        'member_ip_port',
        'state',
        'session_state',
        'availability',
        'raw_json',
    ];

    protected $casts = [
        'raw_json' => 'array',
    ];

    public function device()
    {
        return $this->belongsTo(F5Device::class, 'device_id');
    }

    public function pool()
    {
        return $this->belongsTo(F5Pool::class, 'pool_id');
    }
}