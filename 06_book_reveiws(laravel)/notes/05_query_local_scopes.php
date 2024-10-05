<?php
// important note
/*
 * when you write a sql query with laravel function
 * and want to see it in the sql language use =>
 *      - toSql()
 */


// how to use local query scope
// find a book that matches a specific word
/*
 *  - where('the Column', 'LIKE', '%the word%')->get()
 *
 * instead of that
 *  - declare scopeTitle in the model
 *  class
 *      function public scopeColumnName(builder $scope)
 *
 * function public scopeTitle(Builder $query, string $title) : builder {
 *      return $query->where('title', 'LIKE', "%$title%");
 */


 // popular
/*
 * in Book Model
 * scopePopular(Builder $query)
 *  return $query->withCount('reviews')->orderBy('reviews_count', 'desc');
 */

// highest rated
/*
 * scopeHighestRated(Builder $query)
 *  return $query->withAvg('reviews','rating')->orderBy('reviews_avg_rating', 'desc');
 */

// recent reviews
/*
 * scopeRec
 */
