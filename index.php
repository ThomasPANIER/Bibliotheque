<?php
// Controlleur qui gérer l'affichage de tous les livres
require "model/dataBase.php";
require "model/bookManager.php";

$books = new BookManager();
// var_dump($books);

$book = new Book();

$showBooks = $books->getBooks();
// var_dump($showBooks);

include "view/indexView.php";

// essai modal...
// $bookManager = new BookManager();

// if(isset($_GET["id"]) && !empty($_GET["id"])) {
  
//     $showBook = $bookManager->getBook($_GET["id"]);
//     //var_dump($book);
//     if(!$showBook) {
//         $error = "Le livre sélectionné n'existe pas, essayez une nouvelle sélection.";
//     }

// }
// else {
//     $error = "Vous n'avez pas correctement selectionné le livre, essayez une nouvelle sélection.";
// }
