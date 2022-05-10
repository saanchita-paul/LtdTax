<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('author_name')->nullable();
            $table->string('no_of_page')->nullable();
            $table->string('year_of_issue')->nullable();
            $table->string('cover_page')->nullable();
            $table->float('regular_price')->nullable();
            $table->float('sale_price')->nullable();
            $table->decimal('weight')->nullable()->default(0);
            $table->string('size')->nullable();
            $table->string('file_upload');
            $table->text('short_desc')->nullable();
            $table->longText('description')->nullable();
            $table->string('feature_img')->nullable();
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
        Schema::dropIfExists('books');
    }
}
