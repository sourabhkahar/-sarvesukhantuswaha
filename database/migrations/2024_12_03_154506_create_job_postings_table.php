<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Job title
            $table->string('company'); // Company name
            $table->string('location'); // Job location
            $table->string('employment_type'); // Employment type
            $table->decimal('min_salary', 10, 2)->nullable(); // Minimum salary
            $table->decimal('max_salary', 10, 2)->nullable(); // Maximum salary
            $table->string('currency', 10)->nullable(); // Salary currency
            $table->text('description'); // Job description
            $table->text('requirements')->nullable(); // Requirements (JSON or Text)
            $table->text('responsibilities')->nullable(); // Responsibilities (JSON or Text)
            $table->date('posted_date'); // Posted date
            $table->date('application_deadline')->nullable(); // Application deadline
            $table->string('job_category')->nullable(); // Job category
            $table->string('experience_level')->nullable(); // Experience level
            $table->string('contact_email'); // Contact email
            $table->enum('status', ['Active', 'Inactive', 'Delete'])->default('Active'); // Job status
            $table->timestamps(); // Created_at and Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
}
