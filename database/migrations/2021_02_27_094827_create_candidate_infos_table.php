<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('job_id');
            $table->string('institute')->nullable();
            $table->longtext('other_qualification')->nullable();
            $table->longtext('training_course')->nullable();
            $table->tinyInteger('resume_option')->default(0)->comment('Online apply=0, Email=1, Hard Copy=2');
            $table->integer('short_experience')->default(0);
            $table->longtext('experience')->nullable();
            $table->longtext('add_req')->nullable();
            $table->tinyInteger('gender')->comment('Male=0, Female=1, Both Male & Female=2');
            $table->integer('age_min');
            $table->integer('age_max');
            $table->tinyInteger('status')->default(1)->comment('Active=1, Inactive=0');
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
        Schema::dropIfExists('candidate_infos');
    }
}
