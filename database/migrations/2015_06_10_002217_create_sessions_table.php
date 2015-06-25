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
			$table->string('id', 32)->nullable();
			$table->bigInteger('user_id')->unsigned();
			$table->string('fb_key', 64);
			$table->string('ip', 45);
			$table->timestamp('expires_at');
		
			$table->timestamps();
		});

		Schema::table('sessions', function(Blueprint $table) {
			$table->primary('id');
            $table->index('user_id');
            $table->index('fb_key');
            $table->index('ip');
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

