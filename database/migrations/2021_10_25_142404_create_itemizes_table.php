<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemizes', function (Blueprint $table) {
            $table->id();
            $table->string("image")->comment("封面");
            $table->string('name')->comment("分类名");
            $table->boolean("is_disable")->comment("是否禁用");
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
        Schema::dropIfExists('itemizes');
    }
}
