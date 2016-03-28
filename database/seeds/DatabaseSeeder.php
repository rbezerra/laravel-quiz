<?php

use Illuminate\Database\Seeder;
use App\Poll;
use App\PollOptions;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('PollDataSeeder');
        $this->call('UserDataSeeder');
    }
}

class UserDataSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->delete();

		User::create(array('name' => 'admin',
										'email' => 'admin@admin.com',
										'password' => 'admin'));
		User::create(array('name' => 'ze',
										'email' => 'ze@ze.com',
										'password' => '123'));
	}
}

class PollDataSeeder extends Seeder
{
	public function run()
	{
		DB::table('polls')->delete();
		DB::table('polloptions')->delete();
 
		$poll1 = Poll::create(array('title' => 'Best PHP framework'));
		$poll2 = Poll::create(array('title' => 'Favourite Pizza'));
		$poll3 = Poll::create(array('title' => 'Your development skills'));
 
		PollOptions::create(array('title'=>'Laravel 5','vote'=>0,'poll_id'=>$poll1->id));
		PollOptions::create(array('title'=>'Yii 2','vote'=>0,'poll_id'=>$poll1->id));
		PollOptions::create(array('title'=>'Codeigniter','vote'=>0,'poll_id'=>$poll1->id));
		PollOptions::create(array('title'=>'Other','vote'=>0,'poll_id'=>$poll1->id));
 
		PollOptions::create(array('title'=>'Margherite','vote'=>0,'poll_id'=>$poll2->id));
		PollOptions::create(array('title'=>'Capricciosa','vote'=>0,'poll_id'=>$poll2->id));
		PollOptions::create(array('title'=>'Napoli','vote'=>0,'poll_id'=>$poll2->id));
 
		PollOptions::create(array('title'=>'Poor','vote'=>0,'poll_id'=>$poll3->id));
		PollOptions::create(array('title'=>'Good','vote'=>0,'poll_id'=>$poll3->id));
		PollOptions::create(array('title'=>'Top','vote'=>0,'poll_id'=>$poll3->id));
	}
}

