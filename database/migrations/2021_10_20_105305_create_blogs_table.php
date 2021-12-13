<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            $table->integer("user_id")->comment("用户id");
            $table->integer("itemize_id")->comment("分类");

            $table->string("cover")->comment("封面")->nullable();

            $table->string("title")->comment("博客标题");
            $table->boolean('is_markdown')->comment("是否是markdown");
            $table->text('markdown')->comment("markdown内容");
            $table->text('content')->comment("博客内容");
            $table->boolean('is_open')->comment("是否公开");
            $table->integer("exposure")->comment("曝光量");

            $table->softDeletes();
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
        Schema::dropIfExists('blogs');
    }
}
