<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAquariumFishTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('aquarium_fish', function(Blueprint $table)
		{
			$table->foreign('aquarium_id', 'aquarium_fish_ibfk_1')->references('id')->on('aquarium')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('fish_id', 'aquarium_fish_ibfk_2')->references('id')->on('fish')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('aquarium_fish', function(Blueprint $table)
		{
			$table->dropForeign('aquarium_fish_ibfk_1');
			$table->dropForeign('aquarium_fish_ibfk_2');
		});
	}

}
