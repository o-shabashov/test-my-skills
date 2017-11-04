<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFishTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fish', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->float('speed', 10, 0)->unsigned();
			$table->integer('satiety')->unsigned();
			$table->enum('type', array('carp','easy','pike'))->default('carp');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fish');
	}

}
