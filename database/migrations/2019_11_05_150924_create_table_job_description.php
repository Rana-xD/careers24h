<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableJobDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('JobDescription', function (Blueprint $table) {

            $table->increments('id')
                    ->unique()
                    ->integer();

            $table->string('uuid')
                    ->unique();

            $table->string('name');

            $table->string('responsibility');

            $table->string('workingTerm');

            $table->integer('companyId')->unsigned();
            $table->foreign('companyId')
                    ->references('id')->on('Company');

            $table->integer('positionNo');

            $table->string('benefit');

            $table->integer('offerSalary');

            $table->integer('gender');

            $table->dateTime('deadline');

            $table->integer('experienceRequired');

            $table->string('description');

            $table->integer('cityId')->unsigned();
            $table->foreign('cityId')
                    ->references('id')->on('City');

            $table->boolean('isNegotiable')
                    ->default(false);

            $table->string('requiredSkill');

            $table->integer('qualificationLevel');

            $table->integer('createdBy')->unsigned();
            $table->foreign('createdBy')
                    ->references('id')->on('User');

            $table->integer('updatedBy')
                    ->nullable();

            $table->dateTime('createdAt')
                    ->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->dateTime('updatedAt')
                    ->default(DB::raw('CURRENT_TIMESTAMP'));
            
            $table->integer('state')
                    ->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('JobDescription');
    }
}
