<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_admin')->nullable();
            $table->boolean('is_status')->nullable();
            $table->string('close_id', 20)->unique()->nullable();
            $table->string('short_id', 10)->unique()->nullable();
            $table->string('email', 50)->unique()->nullable();
            $table->string('username', 50)->unique()->nullable();
            $table->string('password', 100)->nullable();
            $table->string('account_name', 50)->nullable();
            $table->string('tel_no', 20)->nullable();
            $table->decimal('discount_rate', 3, 0)->nullable();
            $table->decimal('cod_rate', 3, 0)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }
}
