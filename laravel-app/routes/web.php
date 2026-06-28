<?php
use App\Services\F5\Contracts\F5ClientInterface;
use Illuminate\Support\Facades\Route;

Route::get('/test-f5-client', function (F5ClientInterface $client) {
    return response()->json([
        'virtuals' => $client->getVirtualServers(),
        'pools' => $client->getPools(),
        'nodes' => $client->getNodes(),
        'payment_pool_members' => $client->getPoolMembers('/Common/payment_pool'),
    ]);
});