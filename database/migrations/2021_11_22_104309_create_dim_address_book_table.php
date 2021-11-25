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
            $table->integer("user_id")->nullable();
            $table->string("book_no")->nullable();
            $table->string("book_name")->nullable();
            $table->string("book_tel")->nullable();
            $table->string("book_area")->nullable();
            $table->string("book_address")->nullable();
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
