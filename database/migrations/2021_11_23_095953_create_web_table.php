<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web', function (Blueprint $table) {
            $table->id();
            $table->string('parent_id')->comment("父级id")->default(0)->nullable();
            $table->string("order")->default(0)->nullable();
            $table->string('title')->comment("分类名")->nullable();
            $table->string("is_bottom")->comment("是否为底部");
            $table->string('remarks')->comment("网站备注")->nullable();
            $table->string('url')->comment("网站链接")->nullable();
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
        Schema::dropIfExists('web');
    }
}
