<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBookingMark extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BookingMark', function (Blueprint $table) {

            $table->increments('id')
                    ->unique()
                    ->integer();

            $table->integer('type');

            $table->boolean('isBookedaMark')
                    ->default(false);

            $table->integer('jobId')->unsigned();
            $table->foreign('jobId')
                    ->references('id')->on('JobDescription');

            $table->integer('userId')->unsigned();
            $table->foreign('userId')
                    ->references('id')->on('User');

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
        Schema::dropIfExists('BookingMark');
    }
}
