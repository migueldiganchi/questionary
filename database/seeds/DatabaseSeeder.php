<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UsersTableSeeder');
		$this->call('QuestionsTableSeeder');
		$this->call('AnswersTableSeeder');
		$this->call('MatchInvitationsTableSeeder');
		$this->call('MatchesTableSeeder');
		$this->call('MatchQuestionsTableSeeder');
		$this->call('MatchAnswersTableSeeder');
	}

}
