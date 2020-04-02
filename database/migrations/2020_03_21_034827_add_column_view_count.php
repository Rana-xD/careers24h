<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnViewCount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE jobs ADD view_count bigint(20) unsigned NULL DEFAULT 0 AFTER is_active');
            DB::statement('ALTER TABLE company_profiles ADD view_count bigint(20) unsigned NULL DEFAULT 0 AFTER city');
            DB::statement('ALTER TABLE jobseeker_profiles ADD view_count bigint(20) unsigned NULL DEFAULT 0 AFTER city');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
