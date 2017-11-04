<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAquariumFishTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aquarium_fish', function(Blueprint $table)
		{
			$table->integer('aquarium_id')->unsigned()->index('aquarium_id');
			$table->integer('fish_id')->unsigned()->index('fish_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('aquarium_fish');
	}

}
