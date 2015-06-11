<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sessions', function(Blueprint $table)
		{
			$table->string('id', 32)->default('');
			$table->bigInteger('user_id')->unsigned();
			$table->string('fb_key', 64);
			$table->datetime('expire_at');
		
			$table->timestamps();
		});

		Schema::table('sessions', function(Blueprint $table) {
			$table->primary('id');
            $table->index('user_id');
            $table->index('fb_key');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sessions');
	}

}

