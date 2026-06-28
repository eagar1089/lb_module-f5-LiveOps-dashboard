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
        Schema::create('f5_nodes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('device_id')
                ->constrained('f5_devices')
                ->cascadeOnDelete();

            $table->string('node_name')->nullable();
            $table->string('node_ip');

            $table->string('availability')->nullable();
            $table->string('enabled_state')->nullable();

            $table->json('raw_json')->nullable();

            $table->timestamps();

            $table->unique(['device_id', 'node_ip']);

            $table->index('node_ip');
            $table->index('availability');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f5_nodes');
    }
};
