<?php

namespace App\Models\F5;

use Illuminate\Database\Eloquent\Model;

class F5Device extends Model
{
    protected $fillable = [
        'device_name',
        'mgmt_ip',
        'environment',
        'status',
        'last_sync_at',
        'raw_json',
    ];

    protected $casts = [
        'last_sync_at' => 'datetime',
        'raw_json' => 'array',
    ];

    public function virtualServers()
    {
        return $this->hasMany(F5VirtualServer::class, 'device_id');
    }

    public function pools()
    {
        return $this->hasMany(F5Pool::class, 'device_id');
    }

    public function poolMembers()
    {
        return $this->hasMany(F5PoolMember::class, 'device_id');
    }

    public function nodes()
    {
        return $this->hasMany(F5Node::class, 'device_id');
    }

    public function collectionRuns()
    {
        return $this->hasMany(F5CollectionRun::class, 'device_id');
    }
}