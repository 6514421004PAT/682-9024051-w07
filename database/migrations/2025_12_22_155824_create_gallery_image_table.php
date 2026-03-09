<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    
        Schema::create('gallery_image', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gallery_id'); 
            $table->string('image_path');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        if (Schema::hasTable('gallery')) {
            Schema::table('gallery_image', function (Blueprint $table) {
                $table->foreign('gallery_id')
                      ->references('id')
                      ->on('gallery')
                      ->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_image');
    }
};