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
        Schema::create('society_member', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('society_id')->references('id')->on('societies');
            $table->foreignUuid('user_id')->references('id')->on('users');

            $table->integer('role');
            $table->string('title')->nullable();

            $table->date('renewed_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('society_member');
    }
};
