<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCareerProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CareerProfile', function (Blueprint $table) {
        
            $table->increments('id')
                    ->unique()
                    ->integer();

            $table->integer('userId')->unsigned();
            $table->foreign('userId')
                    ->references('id')->on('User');

            $table->string('workDescription');

            $table->integer('educationType');

            $table->integer('qualificationLevel');

            $table->string('coverLetter');

            $table->string('industry');

            $table->string('aboutMe');

            $table->integer('careerType');

            $table->integer('createdBy');

            $table->integer('updatedBy')
                    ->nullable();

            $table->dateTime('createdAt')
                    ->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->dateTime('updatedAt')
                    ->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CareerProfile');
    }
}
