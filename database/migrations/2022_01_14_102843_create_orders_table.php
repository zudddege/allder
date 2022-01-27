<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->string('order_no', 20)->unique()->nullable();
            $table->string('tracking_no', 20)->nullable();
            $table->string('original_no', 20)->nullable();
            $table->string('return_no', 20)->nullable();
            $table->string('send_name', 50)->nullable();
            $table->string('send_tel', 20)->nullable();
            $table->string('send_detail', 200)->nullable();
            $table->string('send_district', 50)->nullable();
            $table->string('send_city', 50)->nullable();
            $table->string('send_province', 50)->nullable();
            $table->string('send_postal_code', 5)->nullable();
            $table->string('recv_name', 50)->nullable();
            $table->string('recv_tel', 20)->nullable();
            $table->string('recv_detail', 200)->nullable();
            $table->string('recv_district', 50)->nullable();
            $table->string('recv_city', 50)->nullable();
            $table->string('recv_province', 50)->nullable();
            $table->string('recv_postal_code', 5)->nullable();
            $table->string('category_code', 2)->nullable();
            $table->string('category_text', 20)->nullable();
            $table->decimal('weight', 5, 3)->nullable();
            $table->decimal('length', 3, 0)->nullable();
            $table->decimal('width', 3, 0)->nullable();
            $table->decimal('height', 3, 0)->nullable();
            $table->boolean('is_protect_insurance')->nullable();
            $table->boolean('is_return_insurance')->nullable();
            $table->boolean('is_damage_insurance')->nullable();
            $table->boolean('is_express_transpot')->nullable();
            $table->decimal('order_cod', 8, 2)->nullable();
            $table->decimal('order_price', 8, 2)->nullable();
            $table->string('note_detail', 200)->nullable();
            $table->decimal('user_cod', 8, 2)->nullable();
            $table->decimal('user_price', 8, 2)->nullable();
            $table->string('signer_name', 50)->nullable();
            $table->string('signer_type', 50)->nullable();
            $table->string('signature_url', 150)->nullable();
            $table->string('operator_id', 10)->nullable();
            $table->string('operator_tel', 20)->nullable();
            $table->string('operator_branch', 50)->nullable();
            $table->string('pickup_id', 20)->nullable();
            $table->string('status_code', 2)->nullable();
            $table->string('status_text', 30)->nullable();
            $table->string('transport_text', 30)->nullable();
            $table->string('price_policy_code', 1)->nullable();
            $table->string('price_policy_text', 30)->nullable();
            $table->decimal('up_country_fee', 8, 2)->nullable();
            $table->decimal('protect_value', 8, 2)->nullable();
            $table->decimal('protect_fee', 8, 2)->nullable();
            $table->decimal('speed_fee', 8, 2)->nullable();
            $table->decimal('cod_transport_fee', 8, 2)->nullable();
            $table->decimal('return_fee', 8, 2)->nullable();
            $table->decimal('damage_fee', 8, 2)->nullable();
            $table->string('problem_code', 2)->nullable();
            $table->string('problem_text', 100)->nullable();
            $table->string('cancel_reason', 200)->nullable();
            $table->string('source', 20)->nullable();
            $table->decimal('webhook_weight', 5, 3)->nullable();
            $table->decimal('webhook_lenght', 5, 3)->nullable();
            $table->decimal('webhook_width', 5, 3)->nullable();
            $table->decimal('webhook_height', 5, 3)->nullable();
            $table->decimal('webhook_order_cod', 8, 2)->nullable();
            $table->decimal('webhook_order_price', 8, 2)->nullable();
            $table->decimal('webhook_user_cod', 8, 2)->nullable();
            $table->decimal('webhook_user_price', 8, 2)->nullable();
            $table->string('webhook_transport_code', 1)->nullable();
            $table->string('webhook_transport_text', 30)->nullable();
            $table->string('webhook_price_policy_code', 1)->nullable();
            $table->string('webhook_price_policy_text', 30)->nullable();
            $table->decimal('webhook_up_country_fee', 8, 2)->nullable();
            $table->decimal('webhook_declared_protect_value', 8, 2)->nullable();
            $table->decimal('webhook_protect_fee', 8, 2)->nullable();
            $table->decimal('webhook_speed_fee', 8, 2)->nullable();
            $table->decimal('webhook_cod_transfer_fee', 8, 2)->nullable();
            $table->decimal('webhook_return_fee', 8, 2)->nullable();
            $table->decimal('webhook_damage_fee', 8, 2)->nullable();
            $table->decimal('webhook_packaging_fee', 8, 2)->nullable();
            $table->decimal('webhook_label_fee', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('orders');
    }
}
