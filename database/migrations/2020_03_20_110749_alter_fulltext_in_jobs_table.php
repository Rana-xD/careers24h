<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFulltextInJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            DB::statement('ALTER TABLE jobs ADD FULLTEXT job(job_title)');
            DB::statement('ALTER TABLE company_profiles ADD FULLTEXT company(name)');
            DB::statement('ALTER TABLE jobseeker_profiles ADD FULLTEXT candidate(full_name)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
        });
    }
}
