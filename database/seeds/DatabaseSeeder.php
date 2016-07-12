<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User
        factory(App\User::class, 5)->create();

        //Author
        factory(App\Author::class, 1)->create(['user_id' => 2]);
        factory(App\Author::class, 1)->create(['user_id' => 1]);
        factory(App\Author::class, 1)->create(['user_id' => 4]);

        //Book
        factory(App\Book::class, 10)->create();
    }
}
