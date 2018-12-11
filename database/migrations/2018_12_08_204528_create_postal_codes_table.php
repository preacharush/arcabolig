<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostalCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postal_codes', function (Blueprint $table) {
            $table->string('country_a2', 3);
            $table->string('denomination', 30)->nullable();
            $table->string('format', 10)->nullable();
            $table->string('Regex', 150)->nullable();
            $table->boolean('fixedcode')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('country_a2')->references('country_iso_a2')->on('countries')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('postal_codes');
    }
}
