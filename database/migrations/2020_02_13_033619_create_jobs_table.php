<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->string('uuid');
            $table->string('job_title');
            $table->string('category');
            $table->string('working_term');
            $table->integer('pax');
            $table->string('qualification');
            $table->string('career_level');
            $table->string('years_of_experience');
            $table->string('deadline');
            $table->string('offer_salary');
            $table->boolean('is_negotiable')->default(false);
            $table->enum('gender',['MALE','FEMALE','OTHER'])->nullable();
            $table->boolean('is_specific_gender')->default(false);
            $table->text('description')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('required_skill')->nullable();
            $table->text('benefit')->nullable();
            $table->string('city');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('company_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
