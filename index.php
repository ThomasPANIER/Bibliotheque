<?php
// Controlleur qui gérer l'affichage de tous les livres

require "model/bookManager.php";
require "model/entity/book.php";

$books = new BookManager();
var_dump($books);

$book = new Book();


//$book->getBooks();
$showBooks = $books->getBooks();
var_dump($showBooks);