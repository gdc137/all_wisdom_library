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
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->integer('scripture_id')->index();
            $table->string('title', 500);
            $table->text('description')->nullable();
            $table->string('image', 200)->nullable();
            $table->dateTime('visible_at');
            $table->string('meta_slug', 200)->nullable();
            $table->string('meta_title', 500)->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('meta_keywords')->nullable();  
            $table->integer('active_status')->default(1)->index();
            $table->integer('delete_status')->default(0)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divisions');
    }
};
