<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('match_answers', function(Blueprint $table)
		{
			$table->bigIncrements('id')->unsigned();
			$table->bigInteger('match_id')->unsigned();
			$table->bigInteger('question_id')->unsigned();
			$table->tinyInteger('order')->unsigned();
			$table->string('text')->default('');
			$table->boolean('right')->default(false);
			$table->boolean('selected')->default(false);

			$table->timestamps();
		});

		Schema::table('match_answers', function(Blueprint $table) {
            $table->index('match_id');
            $table->index('question_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('match_answers');
	}

}

