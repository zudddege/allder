<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fact_order', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->nullable();
            $table->string("order_no")->nullable();
            $table->string("send_name")->nullable();
            $table->string("send_tel")->nullable();
            $table->string("send_area")->nullable();
            $table->string("send_address")->nullable();
            $table->string("recv_name")->nullable();
            $table->string("recv_tel")->nullable();
            $table->string("recv_area")->nullable();
            $table->string("recv_address")->nullable();
            $table->string("categories")->nullable();
            $table->decimal("weight", 10, 2)->default(0)->nullable();
            $table->decimal("width_size", 10, 2)->default(0)->nullable();
            $table->decimal("length_size", 10, 2)->default(0)->nullable();
            $table->decimal("height_size", 10, 2)->default(0)->nullable();
            $table->decimal("cod", 10, 2)->default(0)->nullable();
            $table->string("note_detail")->nullable();
            $table->boolean("is_return_insurance")->nullable();
            $table->boolean("is_protect_insurance")->nullable();
            $table->boolean("is_express_transport")->nullable();
            $table->boolean("is_damage_insurance")->nullable();
            $table->string("tracking_no")->nullable();
            $table->string("original_tracking")->nullable();
            $table->string("return_tracking")->nullable();
            $table->string("status")->nullable();
            $table->string("cancel_reason")->nullable();
            $table->string("create_time")->nullable();
            $table->string("complete_time")->nullable();
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
        Schema::dropIfExists('fact_order');
    }
}
