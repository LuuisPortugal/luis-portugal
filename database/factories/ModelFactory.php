<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        'name' => join(" ", $faker->sentences),
        'description' => $faker->text(),
        'author_id' => random_int(1, App\Author::count()),
        'year' => $faker->year,
        'pages_length' => $faker->randomDigitNotNull,
        'category_id' => random_int(1, 26)
    ];
});


$factory->define(App\Author::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => join(" ", $faker->words),
        'job' => $faker->jobTitle,
        'email' => $faker->email,
        'telefone' => $faker->randomNumber(9),
        'biography' => join(" ", $faker->paragraphs),
        'image' => $faker->imageUrl(640, 640),
        'imageCover' => $faker->imageUrl(640, 640)
    ];
});