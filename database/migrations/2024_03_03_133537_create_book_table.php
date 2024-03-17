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
        Schema::create('book', function (Blueprint $table) {
            $table->id('b_id');
            $table->string('name');
            $table->enum('gender',['female','male','other']);
            $table->date('date');
            $table->string('email');
            $table->string('address');
            $table->string('service');
            $table->string('doctor');
            $table->string('time');
            $table->string('number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
