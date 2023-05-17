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
        Schema::create('visitor_credentials', function (Blueprint $table) {
            $table->foreignId('id')->constrained(
                table: 'visitors', indexName: 'id'
            );
            // $table->unsignedBigInteger('id');
            // $table->foreign('id')->references('id')->on('visitors');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_credentials');
    }
};
