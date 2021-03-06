<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')
                  ->constrained()
                  ->onDelete('cascade');// userが削除されたとき、それに関連するlikeも一気に削除される
            $table->bigInteger('post_id')
                  ->constrained()
                  ->onDelete('cascade');// postが削除されたとき、それに関連するlikeも一気に削除される
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
