<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('company_logo');
            $table->string('uuid')->unique()->index();
            $table->string('company_name');
            $table->string('company_website');
            $table->string('company_social_media');
            $table->string('company_address');
            $table->string('company_location');
            $table->string('company_start_year');
            $table->string('team_size');
            $table->string('categories');
            $table->text('company_info');
            $table->string('city')->index();
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
        Schema::dropIfExists('employer_profiles');
    }
}
