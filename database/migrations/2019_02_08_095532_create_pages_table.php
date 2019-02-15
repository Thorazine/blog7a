<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');

            // page
            $table->string('slug')->index();
            $table->string('title');
            $table->text('body');

            // google
            $table->string('seo_title')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('robots')->nullable();

            $table->boolean('active')->default(1)->index();
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
        Schema::dropIfExists('pages');
    }
}
