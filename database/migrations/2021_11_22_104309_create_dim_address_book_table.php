<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDimAddressBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dim_address_book', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id", 10)->nullable();
            $table->string("book_no", 10)->nullable();
            $table->string("book_name", 50)->nullable();
            $table->string("book_tel", 20)->nullable();
            $table->string("book_area", 150)->nullable();
            $table->string("book_address", 200)->nullable();
            $table->boolean("is_main_book")->nullable();
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
        Schema::dropIfExists('dim_address_book');
    }
}
