<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoreJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('more_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('job_id');
            $table->tinyInteger('job_level')->default(0)->comment('Entry=0, Mid=1, Top=2');
            $table->string('job_cover_img')->nullable();
            $table->longText('context')->nullable();
            $table->longText('responsibility')->nullable();
            $table->tinyInteger('wrok_place')->default(0)->comment('Work at office = 0 , Work from home=1');
            $table->string('location')->nullable();
            $table->tinyInteger('salary')->comment('Monthly=0, Daily=1, Yearly=2, Hourly=3, Negotiable=4');
            $table->Integer('min_salary');
            $table->Integer('max_salary');
            $table->text('add_salary')->nullable();
            $table->longText('compensation')->nullable();
            $table->tinyInteger('status')->default('1')->comment('Active=1, Inactive=0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('more_jobs');
    }
}
