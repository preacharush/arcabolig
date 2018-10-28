<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('comp_reg_nr')->unique();
			$table->string('comp_name')->nullable();
			$table->string('email', 100)->nullable();
			$table->string('phone', 45)->nullable();
			$table->integer('address_id');
			$table->timestamps();
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
		Schema::drop('company');
	}

}
