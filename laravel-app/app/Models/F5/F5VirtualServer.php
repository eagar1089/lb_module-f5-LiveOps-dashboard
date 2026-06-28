<?php

namespace App\Models\F5;

use Illuminate\Database\Eloquent\Model;

class F5VirtualServer extends Model
{
    protected $fillable = [
        'device_id',
        'vip_name',
        'partition',
        'destination',
        'vip_ip',
        'vip_port',
        'vip_ip_port',
        'pool_name',
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
}