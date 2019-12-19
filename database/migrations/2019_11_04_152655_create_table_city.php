<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('City', function (Blueprint $table) {

            $table->increments('id')
                    ->unique()
                    ->integer();

            $table->string('name');

            $table->integer('state')
                    ->default(1);

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
        Schema::dropIfExists('City');
    }
}
