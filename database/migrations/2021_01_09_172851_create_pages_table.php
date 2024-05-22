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
            $table->id();
            $table->string('pagename',255);
            $table->string('categorycode',255);
            $table->string('taxonomycode',255);
            $table->string('title',225);
            $table->text('description')->nullable();
            $table->string('shortdescription',225)->nullable();
            $table->string('headerimage',225)->nullable();
            $table->string('headertext',225)->nullable();
            $table->string('ordno',225)->nullable();
            $table->string('link',225)->nullable();
            $table->string('metadescription',225)->nullable();
            $table->string('metakeyword',225)->nullable();
            $table->string('metaimage',225)->nullable();
            $table->boolean('status');
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
