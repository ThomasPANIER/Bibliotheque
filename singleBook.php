<?php

// Controleur qui gère l'affichage du détail d'un livre
require "model/dataBase.php";
require "model/bookManager.php";
require "model/userManager.php";

$bookManager = new BookManager();
$userManager = new UserManager();

if(isset($_GET["id"]) && !empty($_GET["id"])) {
  
    $showBook = $bookManager->getBook($_GET["id"]);
    $userBook = $bookManager->getUserBook($_GET["id"]);
    // var_dump($book);
    if(!$showBook) {
        $error = "Le livre sélectionné n'existe pas, essayez une nouvelle sélection.";
    }

}
else {
    $error = "Vous n'avez pas correctement selectionné le livre, essayez une nouvelle sélection.";
}

if(isset($_POST["return"])) {
  
    $bookStatut = $bookManager->returnBook($_GET["id"]);
    // var_dump($book);
    if(!$bookStatut) {
        $error = "test1";
    }

}
else {
    $error = "test2";
}

if(isset($_POST["rent"])) {
  
    $bookStatut = $bookManager->rentBook($_GET["id"]);
    // var_dump($book);
    if(!$bookStatut) {
        $error = "test3";
    }

}
else {
    $error = "test4";
}

if(isset($_POST['confirm'])) {
    $book = $bookManager->deleteBook($_GET["id"]);
    // var_dump($book);
    if($book) {
        header("Location: index.php");
        exit;
    }
}

include "view/bookView.php";

