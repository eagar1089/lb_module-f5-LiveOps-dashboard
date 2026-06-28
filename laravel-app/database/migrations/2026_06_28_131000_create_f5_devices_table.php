<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('f5_devices', function (Blueprint $table) {
            $table->id();

            $table->string('device_name');
            $table->string('mgmt_ip')->unique();
            $table->string('environment')->nullable();
            $table->string('status')->default('unknown');

            $table->timestamp('last_sync_at')->nullable();
            $table->json('raw_json')->nullable();

            $table->timestamps();

            $table->index('device_name');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f5_devices');
    }
};
