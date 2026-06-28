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
        Schema::create('f5_pool_members', function (Blueprint $table) {
            $table->id();

            $table->foreignId('device_id')
                ->constrained('f5_devices')
                ->cascadeOnDelete();

            $table->foreignId('pool_id')
                ->constrained('f5_pools')
                ->cascadeOnDelete();

            $table->string('member_name')->nullable();

            $table->string('member_ip');
            $table->unsignedInteger('member_port');
            $table->string('member_ip_port');

            $table->string('state')->nullable();
            $table->string('session_state')->nullable();
            $table->string('availability')->nullable();

            $table->json('raw_json')->nullable();

            $table->timestamps();

            $table->unique(['device_id', 'pool_id', 'member_ip_port']);

            $table->index('member_ip');
            $table->index('member_ip_port');
            $table->index('availability');
            $table->index('session_state');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f5_pool_members');
    }
};
