<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->index();
            $table->string('title')->nullable();
            $table->string('author')->nullable();
            $table->string('filename');
            $table->string('extension');
            $table->integer('width')->default(0)->nullable();
            $table->integer('height')->default(0)->nullable();
            $table->integer('filesize')->default(0)->nullable();
            $table->boolean('tiny')->default(0);
            $table->integer('drag_order')->default(0)->index();
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
        Schema::dropIfExists('images');
    }
}
