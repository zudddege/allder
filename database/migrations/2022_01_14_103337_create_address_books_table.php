<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressBooksTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('address_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->boolean('is_main')->nullable();
            $table->string('book_no', 10)->unique()->nullable();
            $table->string('book_name', 50)->nullable();
            $table->string('book_tel', 20)->nullable();
            $table->string('book_detail', 200)->nullable();
            $table->string('book_district', 50)->nullable();
            $table->string('book_city', 50)->nullable();
            $table->string('book_province', 50)->nullable();
            $table->string('book_postal_code', 5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('address_books');
    }
}
