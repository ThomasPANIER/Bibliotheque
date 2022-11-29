<?php

// Controleur qui gère l'affichage du détail d'un livre

require "model/bookManager.php";

$bookManager = new BookManager();

if(isset($_GET["id"]) && !empty($_GET["id"])) {
  
    $book = $bookManager->getBook($_GET["id"]);

    if(!$book) {
        $error = "Le livre sélectionné n'existe pas, essayez une nouvelle sélection.";
    }

}
else {
    $error = "Vous n'avez pas correctement selectionné le livre, essayez une nouvelle sélection.";
}

//include "view/indexView.php";

