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
        Schema::create('commentTable', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Unsigned big integer for foreign key
            $table->unsignedBigInteger('doctor_id'); // Unsigned big integer for foreign key
            $table->text('comment')->nullable(); // Nullable comment field

            $table->timestamps();

            $table->foreign('user_id')->references('u_id')->on('signup')->onDelete('cascade');
            $table->foreign('doctor_id')->references('d_id')->on('doctor')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
