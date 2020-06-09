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
        Schema::create('users', function (Blueprint $table) {
                
                $table->bigIncrements('id');
                $table->string('uuid');
                $table->string('username');
                $table->string('phone_number');
                $table->string('email');
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->enum('role',['COMPANY','JOBSEEKER','ADMIN']);
                $table->rememberToken();
                $table->timestamps();

                $table->unique(['uuid','username','email']);
                $table->index(['username','phone_number','email']);

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
