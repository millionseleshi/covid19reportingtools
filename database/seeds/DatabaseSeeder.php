<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(\App\User::class,4)->create();
        factory(\App\ControlNode::class,12)->create();
        factory(\App\DailyReport::class,20)->create();

    }
}
