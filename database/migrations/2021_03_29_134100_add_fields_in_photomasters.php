<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsInphotomasters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photomasters', function (Blueprint $table) {
            $table->string('Title',255);
            $table->string('Link',255);
            $table->string('LinkType',255);
            $table->string('ButtonText',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photomasters', function (Blueprint $table) {
            $table->dropColumn('Title');
            $table->dropColumn('Link');
            $table->dropColumn('LinkType');
            $table->dropColumn('ButtonText');
        });
    }
}
