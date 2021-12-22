<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactOrderTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('fact_order', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->length(10)->nullable();
            $table->string("wh_no", 20)->nullable();
            $table->string("order_no", 20)->nullable();
            $table->string("send_name", 50)->nullable();
            $table->string("send_tel", 20)->nullable();
            $table->string("send_detail", 200)->nullable();
            $table->string("send_district", 50)->nullable();
            $table->string("send_city", 50)->nullable();
            $table->string("send_province", 50)->nullable();
            $table->string("send_postal_code", 5)->nullable();
            $table->string("recv_name", 50)->nullable();
            $table->string("recv_tel", 20)->nullable();
            $table->string("recv_detail", 200)->nullable();
            $table->string("recv_district", 50)->nullable();
            $table->string("recv_city", 50)->nullable();
            $table->string("recv_province", 50)->nullable();
            $table->string("recv_postal_code", 5)->nullable();
            $table->string("category", 20)->nullable();
            $table->decimal("weight", 5, 3)->nullable();
            $table->decimal("length_size", 3, 0)->nullable();
            $table->decimal("width_size", 3, 0)->nullable();
            $table->decimal("height_size", 3, 0)->nullable();
            $table->decimal("cod", 9, 2)->nullable();
            $table->decimal("cod_rate", 9, 2)->nullable();
            $table->decimal("estimate_price", 9, 2)->nullable();
            $table->decimal("estimate_price_rate", 9, 2)->nullable();
            $table->string("note_detail", 200)->nullable();
            $table->boolean("is_return_insurance")->nullable();
            $table->boolean("is_protect_insurance")->nullable();
            $table->boolean("is_express_transport")->nullable();
            $table->boolean("is_damage_insurance")->nullable();
            $table->string("tracking_no", 20)->nullable();
            $table->string("original_tracking", 20)->nullable();
            $table->string("return_tracking", 20)->nullable();
            $table->string("status", 50)->nullable();
            $table->string("cancel_reason", 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('fact_order');
    }
}
