<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchInvitationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('match_invitations', function(Blueprint $table)
		{
			$table->bigIncrements('id')->unsigned();
			$table->bigInteger('host_id')->unsigned();
			$table->bigInteger('guest_id')->unsigned();
			$table->char('status', 1)->default('p'); // p: pending, a: accepted, r:rejected

			$table->timestamps();
		});

		Schema::table('match_invitations', function(Blueprint $table) {
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
		Schema::drop('match_invitations');
	}

}
