<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('relation')->nullable();
            $table->string('martialstatus')->nullable();
            $table->string('bloodgroup')->nullable();
            $table->string('education')->nullable();
            $table->string('ishouseonwer')->nullable();
            $table->text('medicalhistory')->nullable();
            $table->string('othermedicalhistory')->nullable();
            $table->string('noofvehicles')->nullable();
            $table->string('vehiclesnumber')->nullable();
            $table->string('courtcasenumber')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
