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
        Schema::create('inventory_logs', function (Blueprint $table) {
            $table->id();
            $table->string('user')->nullable(); // who did it
            $table->string('action'); // created, updated, deleted
            $table->string('item_name'); // medicine name
            $table->unsignedBigInteger('item_id')->nullable(); // link to medicines table
            $table->json('changes')->nullable(); // store before/after data
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_logs');
    }
};
