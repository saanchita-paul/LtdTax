<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComInfoMatchingVisibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_info_matching_visibilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->tinyInteger('company_name')->default(0);
            $table->tinyInteger('company_addr')->default(0);
            $table->tinyInteger('company_bus')->default(0);
            $table->tinyInteger('age')->default(0);
            $table->tinyInteger('total_year_xp')->default(0);
            $table->tinyInteger('gender')->default(0);
            $table->tinyInteger('area_exp')->default(0);
            $table->tinyInteger('salary')->default(0);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('com_info_matching_visibilities');
    }
}
