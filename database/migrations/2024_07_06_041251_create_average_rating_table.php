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
        Schema::create('average_rating', function (Blueprint $table) {
            $table->id();
            $table->float('average_rating', 2, 1)->nullable();
            $table->integer('number_of_reviews')->nullable();
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('d_id')->on('doctor')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('average_rating');
    }
};
