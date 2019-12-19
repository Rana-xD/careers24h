<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Company', function (Blueprint $table) {

            $table->increments('id')
                    ->unique()
                    ->integer();

            $table->integer('userId')->unsigned();
            $table->foreign('userId')
                    ->references('id')->on('User');
            
            $table->integer('cityId')->unsigned();
            $table->foreign('cityId')
                    ->references('id')->on('City');

            $table->string('companyImageUrl');

            $table->string('uuid')
                    ->unique();

            $table->string('webSiteUrl');

            $table->string('phoneNumber');

            $table->integer('duration');

            $table->dateTime('startedAt')
                    ->nullable();

            $table->string('about');

            $table->string('companyAddress');
                        
            $table->integer('longitude')
                    ->nullable();
            
            $table->integer('latitude')
                    ->nullable();
            
            $table->string('name');

            $table->integer('createdBy');

            $table->integer('updatedBy')
                    ->nullable();

            $table->dateTime('createdAt')
                    ->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->dateTime('updatedAt')
                    ->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->integer('type')
                    ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Company');
    }
}
