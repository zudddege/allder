<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDimNotifyTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('dim_notify', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->length(10)->nullable();
            $table->string('pickup_id', 20)->nullable();
            $table->string('warehouse_no', 20)->nullable();
            $table->string('warehouse_name', 50)->nullable();
            $table->string('contact_name', 50)->nullable();
            $table->string('warehouse_tel', 20)->nullable();
            $table->string('warehouse_detail', 200)->nullable();
            $table->string('warehouse_district', 50)->nullable();
            $table->string('warehouse_city', 50)->nullable();
            $table->string('warehouse_province', 50)->nullable();
            $table->string('warehouse_postal_code', 5)->nullable();
            $table->string('estimate_parcel_quantity', 5)->nullable();
            $table->string('parcel_quantity', 5)->nullable();
            $table->string('status', 20)->nullable();
            $table->string('note_detail', 200)->nullable();
            $table->string('staff_id', 10)->nullable();
            $table->string('staff_name', 50)->nullable();
            $table->string('staff_tel', 20)->nullable();
            $table->string('timeout_text', 100)->nullable();
            $table->string('ticket_message', 200)->nullable();
            $table->string('notice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('dim_notify');
    }
}
