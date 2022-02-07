<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('title')->unique();
            $table->string('dl');
            $table->string('tool');
            $table->string('creater');
            $table->string('janru');
            $table->text('body');
            $table->string('titlegamen');
            $table->string('gamen1')->nullable();
            $table->string('gamen2')->nullable();
            $table->string('gamen3')->nullable();
            $table->integer('ine')->nullable();
            $table->text('comment')->nullable();
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
