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
        Schema::create('f5_pools', function (Blueprint $table) {
            $table->id();

            $table->foreignId('device_id')
                ->constrained('f5_devices')
                ->cascadeOnDelete();

            $table->string('pool_name');
            $table->string('partition')->nullable();

            $table->string('lb_method')->nullable();
            $table->string('monitor')->nullable();

            $table->string('availability')->nullable();
            $table->string('enabled_state')->nullable();

            $table->json('raw_json')->nullable();

            $table->timestamps();

            $table->unique(['device_id', 'pool_name']);

            $table->index('pool_name');
            $table->index('availability');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f5_pools');
    }
};
