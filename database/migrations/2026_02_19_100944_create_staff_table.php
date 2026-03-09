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
    Schema::create('staff', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('tit_id'); 
        $table->string('fname');
        $table->string('lname');
        $table->timestamps();

       
        if (Schema::hasTable('title')) {
            $table->foreign('tit_id')->references('id')->on('title')->onDelete('cascade');
        }
        if (Schema::hasTable('organization')) {
            $table->foreign('org_id')->references('id')->on('organization')->onDelete('cascade');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
