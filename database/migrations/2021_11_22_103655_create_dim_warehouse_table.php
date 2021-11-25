<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDimWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dim_warehouse', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->nullable();
            $table->string("wh_no")->nullable();
            $table->string("wh_name")->nullable();
            $table->string("contact_name")->nullable();
            $table->string("wh_tel")->nullable();
            $table->string("wh_area")->nullable();
            $table->string("wh_address")->nullable();
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
        Schema::dropIfExists('dim_warehouse');
    }
}
