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
        Schema::create('f5_virtual_servers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('device_id')
                ->constrained('f5_devices')
                ->cascadeOnDelete();

            $table->string('vip_name');
            $table->string('partition')->nullable();

            $table->string('destination')->nullable();
            $table->string('vip_ip')->nullable();
            $table->unsignedInteger('vip_port')->nullable();
            $table->string('vip_ip_port')->nullable();

            $table->string('pool_name')->nullable();

            $table->string('availability')->nullable();
            $table->string('enabled_state')->nullable();

            $table->json('raw_json')->nullable();

            $table->timestamps();

            $table->unique(['device_id', 'vip_name']);

            $table->index('vip_ip');
            $table->index('vip_ip_port');
            $table->index('vip_name');
            $table->index('pool_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f5_virtual_servers');
    }
};
