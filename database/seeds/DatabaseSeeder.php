<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $user = new App\User();
        $user->name = "Bob";
        $user->email = "bob@gmail.com";
        $user->password = bcrypt('123456');
        $user->save();

        $user = new App\User();
        $user->name = "Alice";
        $user->email = "alice@gmail.com";
        $user->password = bcrypt('123456');
        $user->save();

        for($i=0;$i<20;$i++){
        	$question=new App\Question();
        	$question->subject=$faker->sentence();
        	$question->detail=$faker->paragraph();
        	$question->user_id=rand(1,2);
        	$question->save();
        }

        for($i=0;$i<50;$i++){
        	$answer=new App\Answer();
        	$answer->detail=$faker->paragraph();
        	$answer->question_id=rand(1,10);
        	$question->user_id=rand(1,2);
        	$answer->save();
        }
    }
}
