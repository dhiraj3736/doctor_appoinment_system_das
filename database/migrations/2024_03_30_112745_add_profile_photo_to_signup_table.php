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
        Schema::table('signup', function (Blueprint $table) {
            $table->string('image')->nullable(); // Add a nullable string column for profile photo

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('signup', function (Blueprint $table) {
            //
        });
    }
};
