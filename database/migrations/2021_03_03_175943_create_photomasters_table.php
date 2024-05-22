<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotomastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photomasters', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->integer('pagecode');
            $table->integer('parentcode');
            $table->integer('gallerycode');
            $table->string('Imagename');
            $table->string('Imagepath');
            $table->string('altimage');
            $table->integer('ordno');
            $table->char('deletestatus', 1)->default('N');
            $table->char('status', 1)->default('Y');
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
        Schema::dropIfExists('photomasters');
    }
}
