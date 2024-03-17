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
        Schema::create('signup', function (Blueprint $table) {
            $table->id('u_id');
            $table->string('fullname');
            $table->enum('gender',["male","female","other"]);
            $table->string('username');
            $table->string('password');
            $table->string('address');
            $table->string('number');
            $table->string('email');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signup');
    }
};
