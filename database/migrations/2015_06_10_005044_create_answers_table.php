<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answers', function(Blueprint $table)
		{
			$table->bigIncrements('id')->unsigned();
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('question_id')->unsigned();
			$table->tinyInteger('order')->unsigned();
			$table->string('text')->default('');
			$table->boolean('right')->default(false);
			
			$table->timestamps();
		});

		Schema::table('answers', function(Blueprint $table) {
            $table->index('user_id');
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
		Schema::drop('answers');
	}

}

