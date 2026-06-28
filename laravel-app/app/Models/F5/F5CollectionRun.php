<?php

namespace App\Models\F5;

use Illuminate\Database\Eloquent\Model;

class F5CollectionRun extends Model
{
    protected $fillable = [
        'device_id',
        'collector_type',
        'status',
        'started_at',
        'finished_at',
        'duration_ms',
        'items_found',
        'items_saved',
        'error_message',
        'raw_response',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'raw_response' => 'array',
    ];

    public function device()
    {
        return $this->belongsTo(F5Device::class, 'device_id');
    }
}