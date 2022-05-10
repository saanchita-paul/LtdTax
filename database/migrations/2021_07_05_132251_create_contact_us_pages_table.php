<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('email');
            $table->text('web_url');
            $table->string('address');
            $table->text('map_url');
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
        Schema::dropIfExists('contact_us_pages');
    }
}
