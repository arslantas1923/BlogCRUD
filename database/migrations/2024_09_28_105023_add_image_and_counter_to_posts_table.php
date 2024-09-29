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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('image')->nullable(); // Resim için string bir alan
            $table->unsignedInteger('views')->default(0); // Sayaç için integer alan
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('views');
        });
    }
};
