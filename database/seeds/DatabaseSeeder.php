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
         //$this->call(UsersTableSeeder::class);
        //factory(App\Product::class,100)->create();
        //100 , how much products that you need.
        factory(App\Review::class,300)->create();
        //300 , how much reviews that you need.
        //factory(App\User::class,100)->create();
    }
}
