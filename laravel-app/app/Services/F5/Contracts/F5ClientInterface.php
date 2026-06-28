<?php

namespace App\Services\F5\Contracts;

interface F5ClientInterface
{
    public function getVirtualServers(): array;
    public function getPools(): array;
    public function getNodes(): array;
    public function getPoolMembers(string $poolName): array;
    public function getVirtualStats(): array;
    public function getPoolStats(): array;
    public function getPoolMemberStats(string $poolName): array;
}