<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->text('body');
            $table->boolean('featured')->default(false);
            $table->string('image');
            $table->integer('likes')->default(0);
            $table->timestamps();
        });

        Schema::create('category_post', function(Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('post_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::create('post_tag', function(Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('tag_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });

        Schema::create('likes', function(Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->integer('like')->nullable();
            $table->timestamps();
        });

        Schema::create('comments', function(Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->text('comment');
            $table->timestamps();
        });

        Schema::create('replies', function(Blueprint $table) {
            $table->id();
            $table->foreignId('comment_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->text('reply');
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
        Schema::dropIfExists('posts');
        Schema::dropIfExists('category_post');
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('replies');
    }
}
