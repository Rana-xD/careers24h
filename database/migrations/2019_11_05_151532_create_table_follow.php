<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFollow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Follow', function (Blueprint $table) {

            $table->increments('id')
                     ->unique()
                     ->integer();
 
             $table->integer('type');
             
             $table->integer('companyId')->unsigned();
             $table->foreign('companyId')
                     ->references('id')->on('Company');
 
             $table->integer('userId')->unsigned();
             $table->foreign('userId')
                     ->references('id')->on('User');
 
             $table->boolean('isNotified')
                     ->default(false);
 
             $table->dateTime('lastNotified');
 
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
        Schema::dropIfExists('Follow');
    }
}
