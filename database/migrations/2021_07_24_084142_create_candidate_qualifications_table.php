<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_qualifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->tinyInteger('qualification_id')->default(8)->comment('PSC/5 Pass=0, JSD/JDC/8 Pass=1, Secondary=2, Higher Secondary=3, Diploma=4, Bachelor/Honors=5, Masters=6, PhD(Doctor of Philosophy)=7');;
            $table->integer('degree_id')->default(0);
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
        Schema::dropIfExists('candidate_qualifications');
    }
}
