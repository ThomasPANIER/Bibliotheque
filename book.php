<?php
// Controleur qui gère l'affichage du détail d'un livre

require "model/bookManager.php";
$book = new BookManager();
// $book = new Book();

if(isset($_GET["id"]) && !empty($_GET["id"])) {
  
    $book = $book->getBook($_GET["id"]);
    var_dump($book);
    if(!$book) {
        
        $error = "test 1";
    }

}
else {
 
    $error = "test 2";
}

include "view/bookView.php";
