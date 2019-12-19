<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRolePermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RolePermission', function (Blueprint $table) {

            $table->increments('id')
                    ->unique()
                    ->integer();

            $table->string('name');

            $table->integer('code');

            $table->integer('type');

            $table->integer('groupId')->unsigned();
            $table->foreign('groupId')
                    ->references('id')->on('PermissionGroup');

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
        Schema::dropIfExists('RolePermission');
    }
}
