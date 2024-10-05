<?php
// one to many
/*
 * in one-to-many relationship
 * one child belongs to one parent
 * one parent has many children
 */


//----------------------------
// migration
/*
 * we have multiple ways
 * first
 *  - $table->unsignedBigInteger('book_id')
 *  - $table->foreign('book_id')->reference('id')->on('books')->ondelete('cascade')
 *
 * second
 *  - $table->foreignId('book_id')->constrained()->cascadeondelete();
 */


//------------------------------------
// model
/*
 * in parent model (Book)
 * (function name should be plural)
 *      - public function  reviews() {
 *          return $this->hasMany(Review::class)
 *        }
 *
 * in child class (Review
 *      - public function book() {
 *          return $this->belongsTo(Books::class);
 *        }
 */
