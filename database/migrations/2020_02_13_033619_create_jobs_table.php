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
            $table->string('category')->index();
            $table->string('working_term')->index();
            $table->integer('pax');
            $table->string('qualification')->index();
            $table->string('career_level')->index();
            $table->string('years_of_experience')->index();
            $table->string('deadline');
            $table->string('offer_salary')->index();
            $table->boolean('is_negotiable')->default(false);
            $table->enum('gender',['MALE','FEMALE','OTHER'])->nullable()->index();
            $table->boolean('is_specific_gender')->default(false);
            $table->text('description')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('required_skill')->nullable();
            $table->text('benefit')->nullable();
            $table->string('city')->index();
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
