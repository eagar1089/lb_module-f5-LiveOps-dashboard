<?php

namespace App\Models\F5;

use Illuminate\Database\Eloquent\Model;

class F5Node extends Model
{
    protected $fillable = [
        'device_id',
        'node_name',
        'node_ip',
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