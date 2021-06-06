<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('logo')->nullable();;
            $table->string('email');
            $table->string('mobile');
            $table->string('gst')->nullable();
            $table->string('address');
            $table->string('state');
            $table->string('zip');
            $table->string('country');
            $table->string('invoice_note')->nullable();;
            $table->string('quotation_note')->nullable();;
            $table->string('challan_note')->nullable();;
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
        Schema::dropIfExists('profiles');
    }
}
