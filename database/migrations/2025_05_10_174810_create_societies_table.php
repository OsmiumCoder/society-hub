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
        Schema::create('societies', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('university_id')->references('id')->on('universities');

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('email');

            $table->string('facebook_url')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('discord_url')->nullable();

            $table->string('meeting_schedule')->nullable();
            $table->string('meeting_location')->nullable();

            $table->date('founding_date')->nullable();

            $table->boolean('is_active')->default(true);
            $table->boolean('is_official')->default(false);

            $table->string('category')->nullable();

            $table->json('tags')->nullable();

            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('societies');
    }
};
