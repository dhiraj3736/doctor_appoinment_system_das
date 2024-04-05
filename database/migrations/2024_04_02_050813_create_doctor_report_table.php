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
        Schema::create('doctor_report', function (Blueprint $table) {
            $table->id('r_id');
            $table->text('report');
            $table->unsignedBigInteger('b_id'); // Foreign key column
            $table->foreign('b_id')->references('b_id')->on('book')->onDelete('cascade');
            $table->unsignedBigInteger('u_id'); // Foreign key column
            $table->foreign('u_id')->references('u_id')->on('signup')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_report');
    }
};
