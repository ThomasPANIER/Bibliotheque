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

// if(isset($_POST["rent"])) {

//     if(!empty($_POST) && isset($_POST["rentUser"])) {

//         $book = $bookManager->updateBookStatus($_GET["id"]);

//         foreach($_POST as $key => $value) {
//             $_POST[$key] = htmlspecialchars($value);
//         }
//         if(empty($_POST["id"])) {
//             $error1 = "Vous n'avez pas rentré de id";
//         }
//         else {
//             $error1 = false;
//         }
        
//         if(!$error1) {
            
//             $book = new Book($_POST);

//             if($bookManager->updateBookStatus($book)) {
//                 header("Location:index.php");
//                 exit;
//             }
//         }

//     }
// }

if(isset($_POST['confirm'])) {
    $book = $bookManager->deleteBook($_GET["id"]);
    // var_dump($book);
    if($book) {
        header("Location: index.php");
        exit;
    }
}

include "view/bookView.php";

