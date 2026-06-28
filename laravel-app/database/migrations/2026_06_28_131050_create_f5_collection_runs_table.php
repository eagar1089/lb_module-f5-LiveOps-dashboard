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
        Schema::create('f5_collection_runs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('device_id')
                ->nullable()
                ->constrained('f5_devices')
                ->nullOnDelete();

            $table->string('collector_type');
            $table->string('status');

            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();

            $table->unsignedBigInteger('duration_ms')->nullable();
            $table->unsignedInteger('items_found')->default(0);
            $table->unsignedInteger('items_saved')->default(0);

            $table->text('error_message')->nullable();
            $table->json('raw_response')->nullable();

            $table->timestamps();

            $table->index('collector_type');
            $table->index('status');
            $table->index('started_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f5_collection_runs');
    }
};
