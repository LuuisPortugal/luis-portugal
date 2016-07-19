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
        factory(App\Author::class, 8)->create();

        //Category
        $categories = ['Livros sobre agropecuária‎', 'Antologias‎', 'Audiobooks‎', 'Livros de autoajuda‎', 'Livros de aventura‎', 'Livros biográficos‎',
            'Livros científicos‎', 'Livros de contos‎', 'Livros de crônicas‎', 'Livros didáticos‎', 'Livros épicos‎', 'Livros de fantasia‎',
            'Livros de ficção científica‎', 'Livros de ficção histórica‎', 'Guias de viagem‎', 'Livros de horror‎', 'Livros infantojuvenis‎',
            'Listas de livros por gênero‎', 'Livros infantis‎', 'Livros-jogos‎', 'Manuais‎', 'Livros de memórias‎', 'Livros de Natal‎',
            'Livros de poesia‎', 'Livros de política‎', 'Romances por género‎'];
        foreach($categories as $category){
            App\Category::create(['name' => $category]);
        }

        //Book
        factory(App\Book::class, 20)->create();
    }
}
