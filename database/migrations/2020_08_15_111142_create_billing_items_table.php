<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('billing_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->string('rate_per_unit');
            $table->string('sub_total_rate');
            $table->string('gst');
            $table->string('discount');
            $table->string('total_rate');
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
        Schema::dropIfExists('billing_items');
    }
}
