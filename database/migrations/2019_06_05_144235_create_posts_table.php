<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('title');
            $table->longText('body');
            $table->tinyInteger('comments_locked')->default(false);
            $table->unsignedBigInteger('author_id');
            $table->string('url_string')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->mediumText('summary')->nullable();
            $table->boolean('is_published');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
