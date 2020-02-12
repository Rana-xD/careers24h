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
            $table->string('company_logo')->default('https://careers24h.s3-ap-southeast-1.amazonaws.com/defaul_logo.jpg');
            $table->string('uuid')->unique()->index();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('social_media')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('start_year')->nullable();
            $table->string('team_size')->nullable();
            $table->string('categories')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('info')->nullable();
            $table->string('city')->index()->nullable();
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
