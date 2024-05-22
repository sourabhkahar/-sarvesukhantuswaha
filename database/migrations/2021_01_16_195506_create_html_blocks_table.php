<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHtmlBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('html_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('blockname',255);
            $table->string('htmlblock',255);
            $table->string('status',255);
            $table->integer('categorycode');
            $table->integer('taxonmycode');
            $table->integer('pagecode');
            $table->integer('ordno');
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
        Schema::dropIfExists('html_blocks');
    }
}
