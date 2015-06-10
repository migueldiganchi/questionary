<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('matches', function(Blueprint $table)
		{
			$table->bigIncrements('id')->unsigned();
			$table->bigInteger('host_id')->unsigned();
			$table->bigInteger('guest_id')->unsigned();
			$table->tinyInteger('questions_number')->unsigned()->default(0);
			$table->tinyInteger('answers_number')->unsigned()->default(0);
			$table->tinyInteger('rights_number')->unsigned()->default(0);

			$table->timestamps();
		});

		Schema::table('matches', function(Blueprint $table) {
            $table->index('host_id');
            $table->index('guest_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('matches');
	}

}


