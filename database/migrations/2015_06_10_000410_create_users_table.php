<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigIncrements('id')->unsigned();
			$table->string('email');
			$table->string('name', 128)->default('');
			$table->string('password', 32)->nullable();
			$table->string('fb_key', 32)->nullable();
			$table->tinyInteger('questions_number')->unsigned()->default(0);

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::table('users', function(Blueprint $table) {
            $table->unique('email');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}

