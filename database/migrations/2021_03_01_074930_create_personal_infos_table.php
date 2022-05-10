<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('present_district_id')->nullable();
            $table->unsignedBigInteger('present_thana_id')->nullable();
            $table->unsignedBigInteger('permanent_district_id')->nullable();
            $table->unsignedBigInteger('permanent_thana_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('slug')->nullable();
            $table->tinyInteger('religion')->default(6)->comment('Islam=1, Christianity=2, Hinduism=3, Buddhists=4, Others=5');
            $table->tinyInteger('marital_status')->default(5)->comment('Single=1, Married=2, Divorced=3, Widowed=4');
            $table->tinyInteger('gender')->default(4)->comment('Male=1, Female=2, Other=3');
            $table->string('nationality')->nullable();
            $table->string('nid')->nullable();
            $table->string('passport')->nullable();
            $table->string('passport_issue_date')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('mobile3')->nullable();
            $table->string('alt_email')->nullable();
            $table->string('present_address_1')->nullable();
            $table->string('present_address_2')->nullable();
            $table->integer('present_post_code')->nullable();
            $table->string('permanent_address_1')->nullable();
            $table->string('permanent_address_2')->nullable();
            $table->integer('permanent_post_code')->nullable();
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
        Schema::dropIfExists('personal_infos');
    }
}
