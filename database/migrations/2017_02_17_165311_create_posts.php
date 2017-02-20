<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->default(1); //Post belongs to 'uncategorized' by default
            $table->string('title');
            $table->string('slug');
            $table->string('tags');
            $table->string('image');
            $table->string('template')->default('default');
            $table->text('excerpt');
            $table->text('content');
            $table->enum('status', ['published', 'unpublished'])->default('unpublished');
            $table->boolean('is_commentable')->default(true);
            $table->datetime('published_at');
            $table->integer('last_updated_by');
            $table->timestamps();
            $table->softDeletes();
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
