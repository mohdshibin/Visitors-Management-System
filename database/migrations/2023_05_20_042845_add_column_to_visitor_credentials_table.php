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
        Schema::table('visitor_credentials', function (Blueprint $table) {
            $table->timestamp('last_check_in')->default(now());
            $table->bigInteger('due')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visitor_credentials', function (Blueprint $table) {
            //
        });
    }
};
