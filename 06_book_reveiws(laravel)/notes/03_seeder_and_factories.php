<?php

// factories
/*
 * 1) for Book
 *      php artisan make:factory BookFactory --model=Book
 *
 *      adding the definition()
 *      {
 *      return [
 *      'title' => fake()->sentence(3),
 *      'author' => fake()->sentence(3),
 *      'created_at' => fake()->dateTimeBetween('-2 years'),
 *      'updated_at' => function (array $attribute) { return fake()->dateTime,
 *           Between($attribute['created_at'],
 *      ];}
 *
 *
 * ----------------------------------------
 * 2) for review
 *      php artisan make:factory ReviewFactory --model=Review
 *
 *      definition
 *          'rating' => fake->numberBetween(1,5)
 *
 */


//seeder
/*
 * databaseSeeder
 *  - run()
 *      Book::factory(howManyEntities)->create()->each(
 *      function ($book) {
 *          $numReviews = random_int(5, 30);
 *          Review::factory()->count($numReviews)
 *              ->good()
 *              ->for($book)
 *              ->create()
 *      )
 */
