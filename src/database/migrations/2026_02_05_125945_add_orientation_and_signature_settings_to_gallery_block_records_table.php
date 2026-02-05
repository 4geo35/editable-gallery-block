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
        Schema::table('gallery_block_records', function (Blueprint $table) {
            $table->dateTime("is_vertical")->nullable()->after("description");
            $table->dateTime("show_signatures")->nullable()->after("is_vertical");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallery_block_records', function (Blueprint $table) {
            $table->dropColumn("is_vertical");
            $table->dropColumn("show_signatures");
        });
    }
};
