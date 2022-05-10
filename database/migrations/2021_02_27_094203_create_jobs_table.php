<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('jobcat_id');
            $table->string('title');
            $table->string('slug');
            $table->string('vacancy')->nullable();
            $table->tinyInteger('emp_status')->default(0)->comment('Full Time=0, Half Time=1');
            $table->string('deadline');
            $table->tinyInteger('resume_option')->default(0)->comment('Online apply=0, Email=1, Hard copy=2');
            $table->longText('instruction')->nullable();
            $table->tinyInteger('hot_job')->default(0)->comment('Category Job=0, Hot Job=1');
            $table->tinyInteger('status')->default(1)->comment('Pending=0, Approved=1, Drafted=2');
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
        Schema::dropIfExists('jobs');
    }
}
