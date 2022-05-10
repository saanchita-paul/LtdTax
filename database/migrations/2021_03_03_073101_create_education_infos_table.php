<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('child_id');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('board')->default(11)->comment('Barisal=0, Chittagong=1, Comilla=2, Dhaka=3, Dinajpur=4, Jashore=5, Mymensingh=6 , Rajshahi=7, Sylhet=8, Madrasha=9, Technical=10, Others=11');
            $table->string('major');
            $table->string('institution');
            $table->tinyInteger('result')->comment('First Division=0, Second Division=1, Third Division=2, Grade=3, Appeared=4, Enrolled=5, Awarded=6 , Do Not Mention=7, Pass=8');
            $table->float('cgpa');
            $table->integer('pass_year');
            $table->string('duration');
            $table->string('achievement')->nullable();
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
        Schema::dropIfExists('education_infos');
    }
}
