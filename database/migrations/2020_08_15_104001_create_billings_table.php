<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_no');
            $table->integer('customer_id');
            $table->date('issue_date');
            $table->date('due_date');
            $table->string('po_no');
            $table->string('sub_total');
            $table->string('discount');
            $table->string('gst');
            $table->string('total');
            $table->string('receive_amount');
            $table->string('due_amount');
            $table->string('payment_type');
            $table->string('narration');
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
        Schema::dropIfExists('billings');
    }
}
