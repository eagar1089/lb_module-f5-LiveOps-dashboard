<?php

namespace App\Services\F5\Clients;

use App\Services\F5\Contracts\F5ClientInterface;
use Illuminate\Support\Facades\Http;

class MockF5Client implements F5ClientInterface
{
    private string $baseUrl;
    public function __construct()
    {
        $this->baseUrl = rtrim(config('f5.mock_base_url'), '/');
    }
    public function getVirtualServers(): array
    {
        return Http::get($this->baseUrl . '/mgmt/tm/ltm/virtual')
            ->json('items') ?? [];
    }
    public function getPools(): array
    {
        return Http::get($this->baseUrl . '/mgmt/tm/ltm/pool')
            ->json('items') ?? [];
    }
    public function getNodes(): array
    {
        return Http::get($this->baseUrl . '/mgmt/tm/ltm/node')
            ->json('items') ?? [];
    }
    public function getPoolMembers(string $poolName): array
    {
        return Http::get($this->baseUrl . '/mgmt/tm/ltm/pool/' . urlencode($poolName) . '/members')
            ->json('items') ?? [];
    }
    public function getVirtualStats(): array
    {
        return Http::get($this->baseUrl . '/mgmt/tm/ltm/virtual/stats')
            ->json('entries') ?? [];
    }
    public function getPoolStats(): array
    {
        return Http::get($this->baseUrl . '/mgmt/tm/ltm/pool/stats')
            ->json('entries') ?? [];
    }
    public function getPoolMemberStats(string $poolName): array
    {
        return Http::get($this->baseUrl . '/mgmt/tm/ltm/pool/' . urlencode($poolName) . '/members/stats')
            ->json('entries') ?? [];
    }
}