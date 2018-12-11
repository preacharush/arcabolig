<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->string('continent_a2', 2)->nullable();
            $table->string('country_iso_a2', 3)->primary();
            $table->string('country_iso_a3', 3)->nullable();
            $table->string('fips', 4)->nullable();
            $table->string('nuts', 3)->nullable();
            $table->string('hasc', 2)->nullable();
            $table->string('name_english', 45)->nullable();
            $table->string('language', 3)->nullable();
            $table->string('language_pc', 10)->nullable();
            $table->boolean('has_zip_codes')->nullable();
            $table->string('phone_code', 6)->nullable();
            $table->string('tld', 10)->nullable();
            $table->string('latitude', 10)->nullable();
            $table->string('longitude', 10)->nullable();
            $table->integer('altitude')->nullable();
            $table->string('territory_of',3)->nullable();
            $table->string('updates',1)->nullable();
            $table->timestamps()->nullable();
            
            $table->engine = 'InnoDB';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
