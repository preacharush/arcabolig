<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyHasAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_has_addresses', function (Blueprint $table) {
            $table->integer('property_id');
            $table->integer('address_id');
            $table->timestamps();
            $table->foreign('property_id')->references('id')->on('property')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('address_id')->references('id')->on('address')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_has_addresses');
    }
}
