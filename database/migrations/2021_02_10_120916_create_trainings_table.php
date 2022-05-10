<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('tcat_id');
            $table->string('train_img');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('end_of_reg');
            $table->string('venue');
            $table->string('duration');
            $table->float('regular_price');
            $table->float('price');
            $table->decimal('weight')->default(0);
            $table->text('course_outline')->nullable();
            $table->text('participant')->nullable();
            $table->text('outcome')->nullable();
            $table->unsignedBigInteger('trainer_id');
            $table->string('trainer_position');
            $table->text('trainer_cv')->nullable();
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
        Schema::dropIfExists('trainings');
    }
}
