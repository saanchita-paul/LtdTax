<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_id');
            $table->unsignedBigInteger('jobcat_id');
            $table->unsignedBigInteger('preforg_id');
            $table->text('career_obj');
            $table->integer('pre_salary');
            $table->integer('exp_salary');
            $table->integer('job_nature')->default('1')->comment(' Full Time=0, Part Time=1, Contractual=2');
            $table->text('special_skill');
            $table->integer('pref_loc')->default('1')->comment('Inside BD=0, Outside BD=1');
            $table->longText('summery');
            $table->longText('spec_qualification');
            $table->string('keyword');
            $table->integer('status')->default('1')->comment('Active=1, Inactive=0');
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
        Schema::dropIfExists('careers');
    }
}
