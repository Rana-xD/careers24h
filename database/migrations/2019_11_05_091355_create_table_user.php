<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User', function (Blueprint $table) {

            $table->increments('id')
                    ->unique()
                    ->integer();

            $table->string('uuid')
                    ->unique();
            
            $table->string('clientId');

            $table->string('clientSecret');

            $table->string('emailAddress')
                    ->nullable();

            $table->string('phoneNumber')
                    ->nullable();

            $table->integer('roleId')
                    ->nullable();

            $table->boolean('isConfirmed')
                    ->default(false);

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
        Schema::dropIfExists('User');
    }
}
