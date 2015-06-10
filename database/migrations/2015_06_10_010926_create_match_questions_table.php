<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('match_questions', function(Blueprint $table)
		{
			$table->bigIncrements('id')->unsigned();
			$table->bigInteger('match_id')->unsigned();
			$table->tinyInteger('order')->unsigned();
			$table->string('text', 3)->default('');
			$table->boolean('answered')->default(false);
			$table->boolean('right')->default(false);

			$table->timestamps();
		});

		Schema::table('match_questions', function(Blueprint $table) {
            $table->index('match_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('match_questions');
	}

}

