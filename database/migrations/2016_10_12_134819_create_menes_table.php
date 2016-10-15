<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imagePath');
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->string('type');
            $table->string('color')->nullable();
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
        Schema::drop('menes');
    }
}
