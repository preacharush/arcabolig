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
            $table->engine = 'MyISAM';
            $table->integer('properties_id')->unsigned()->nullable();
            $table->integer('address_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('properties_id')->references('id')->on('properties')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('address_id')->references('id')->on('address')->onUpdate('CASCADE')->onDelete('CASCADE');
            
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
