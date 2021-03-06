<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_reg_nr', 100);
            $table->string('client_name')->nullable();
            $table->string('client_contact')->nullable();
            $table->integer('client_phone1')->nullable();
            $table->string('client_email', 150)->nullable();
            $table->integer('address_id');
            $table->timestamps();
            $table->foreign('address_id')->references('id')->on('address')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->engine = 'InnoDB';
            $table->collation = 'utf8_unicode_ci';

            //Their is a foreign key in the MANY 2 MANY relation "client_has_property" table
        });

        // this has to target client_id DB::statement('ALTER TABLE client AUTO_INCREMENT = 1000;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
