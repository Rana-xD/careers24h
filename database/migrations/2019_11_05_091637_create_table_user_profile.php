<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UserProfile', function (Blueprint $table) {

            $table->increments('id')
                    ->unique()
                    ->integer();

            $table->integer('userId')->unsigned();
            $table->foreign('userId')
                    ->references('id')->on('User');

            $table->integer('gender');

            $table->string('firstName');
            
            $table->string('lastName');

            $table->boolean('isEmailVerify')
                    ->default(false);

            $table->boolean('isPrivate')
                    ->default(false);

            $table->integer('createdBy');

            $table->integer('updatedBy')
                    ->nullable();

            $table->dateTime('createdAt')
                    ->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->dateTime('updatedAt')
                    ->default(DB::raw('CURRENT_TIMESTAMP'));
            
            $table->dateTime('dateOfBirth');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UserProfile');
    }
}
