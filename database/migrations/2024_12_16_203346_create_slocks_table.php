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
        Schema::create('slocks', function (Blueprint $table) {
            $table->id();
            $table->integer('lang_id')->index();
            $table->integer('division_id')->index();
            $table->integer('ref_id')->index()->nullable();
            $table->text('slock', 500);
            $table->text('short_description');
            $table->text('description');
            $table->text('summary')->nullable();
            $table->string('audio', 200)->nullable();
            $table->dateTime('visible_at');
            $table->string('meta_slug', 200)->nullable();
            $table->string('meta_title', 500)->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->integer('active_status')->default(1)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slocks');
    }
};
