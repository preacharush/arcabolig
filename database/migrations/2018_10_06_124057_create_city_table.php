<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('city', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('City', 100)->nullable();
			$table->string('zipcode', 45)->nullable();
			$table->integer('Country_id');
			$table->timestamps();
			$table->foreign('country_id')->references('id')->on('country')->onUpdate('CASCADE')->onDelete('CASCADE');
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
		Schema::drop('city');
	}

}
