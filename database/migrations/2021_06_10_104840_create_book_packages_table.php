<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->string('slug');
            $table->text('package_desc')->nullable();
            $table->string('package_img')->nullable();
            $table->float('regular_price');
            $table->float('price');
            $table->decimal('weight')->nullable()->default(0);
            $table->tinyInteger('status')->comment('Active=1,Inactive=0')->default(1);
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
        Schema::dropIfExists('book_packages');
    }
}
