<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouriersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->string('pickup_id', 20)->unique()->nullable();
            $table->string('warehouse_no', 20)->nullable();
            $table->string('warehouse_name', 50)->nullable();
            $table->string('contact_name', 50)->nullable();
            $table->string('warehouse_tel', 20)->nullable();
            $table->string('warehouse_detail', 200)->nullable();
            $table->string('warehouse_district', 50)->nullable();
            $table->string('warehouse_city', 50)->nullable();
            $table->string('warehouse_province', 50)->nullable();
            $table->string('warehouse_postal_code', 5)->nullable();
            $table->string('parcel_quantity', 5)->nullable();
            $table->string('status_code', 2)->nullable();
            $table->string('status_text', 30)->nullable();
            $table->string('note_detail', 200)->nullable();
            $table->string('operator_id', 10)->nullable();
            $table->string('operator_name', 50)->nullable();
            $table->string('operator_tel', 20)->nullable();
            $table->string('operation_branch', 50)->nullable();
            $table->string('timeout_text', 100)->nullable();
            $table->string('ticket_message', 200)->nullable();
            $table->string('cancel_operator', 20)->nullable();
            $table->string('cancel_reason', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('couriers');
    }
}
