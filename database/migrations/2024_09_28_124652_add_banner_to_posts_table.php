<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBannerToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('banner')->nullable(); // banner alanı ekleniyor
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('banner'); // banner alanı geri alınıyor
        });
    }
}
