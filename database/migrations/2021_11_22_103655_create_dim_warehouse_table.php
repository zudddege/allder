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
            $table->integer("user_id", 2)->nullable();
            $table->string("wh_no", 20)->nullable();
            $table->string("wh_name", 50)->nullable();
            $table->string("contact_name", 50)->nullable();
            $table->string("wh_tel", 20)->nullable();
            $table->string("wh_area", 150)->nullable();
            $table->string("wh_address", 200)->nullable();
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
