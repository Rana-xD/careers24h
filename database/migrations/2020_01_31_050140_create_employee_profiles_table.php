<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseeker_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('uuid');
            $table->string('user_profile')->default('https://careers24h.s3-ap-southeast-1.amazonaws.com/defaul_profile.png');
            $table->string('full_name')->nullable();
            $table->string('age')->nullable();
            $table->enum('gender',['MALE','FEMALE','OTHER'])->index()->nullable();
            $table->text('experience')->nullable();
            $table->string('career_level')->index()->nullable();
            $table->string('education_level')->index()->nullable();
            $table->string('industry')->index()->nullable();
            $table->text('about')->nullable();
            $table->text('skillset')->nullable();
            $table->text('social_media')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->text('cover_letter')->nullable();
            $table->text('education')->nullable();
            $table->text('work_experience')->nullable();
            $table->text('language')->nullable();
            $table->boolean('is_private')->default(false);
            
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_profiles');
    }
}
