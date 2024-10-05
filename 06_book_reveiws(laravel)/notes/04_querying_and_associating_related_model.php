<?php

// lazy loading
/*
 * example
 *  1) select specific book by id
 *      $book = \app\model\book::Find();
 *  2) then selected what review related to it
 *
 */


//  lazy loading => use eagar loading
/*
 *  1) select book with all related reviews
 *      $book = Book::with('reviews')->find(1) ;
 */


// get multiple book with they reviews
/*
 * $book = Book::with('reviews')->take(3)->get();
 *   to get 3 books with thier reviews
 */


// create review by book id
/*
 * $book = Book::Find(1);
 * $review = $book->review()->created[9'review' => 'sample review', 'rating' => 3]);
 */


// change the review book by review
/*
 * $review = Review::Find(1);
 * $book2 = Book::find(2)
 * $book2->reviews()->save($review);
 */


// lazy loading vs. eager loading
/*
 * lazy loading will return data only when it needed use it with small data
 * while eager will return all data once use it with much larger data
 */


// Note
/*
 * load() function => to select what data related to the model
 *      $book = Book::find(1)->load('reviews')
 */
