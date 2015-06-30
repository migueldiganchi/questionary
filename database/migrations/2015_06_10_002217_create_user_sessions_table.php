<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_sessions', function(Blueprint $table)
		{
			$table->string('session_id', 32)->unique();
			$table->bigInteger('user_id')->unsigned();
			$table->string('fb_token', 64);
			$table->string('ip', 45);
			$table->timestamp('expires_at');
			$table->text('data')->nullable();
		
			$table->timestamps();
		});

		Schema::table('user_sessions', function(Blueprint $table) {
			$table->primary('session_id');
            $table->index('user_id');
            $table->index('fb_token');
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
		Schema::drop('user_sessions');
	}

}