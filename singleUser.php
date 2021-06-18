<?php

// Controleur qui gère l'affichage du détail d'un utilisateur
require "model/dataBase.php";
require "model/userManager.php";
require "model/bookManager.php";

$userManager = new UserManager();
$bookManager = new BookManager();

if(isset($_GET["id"]) && !empty($_GET["id"])) {
  
    $showUser = $userManager->getUserById($_GET["id"]);
    $bookUser = $userManager->getBookUser($_GET["id"]);

    if(!$showUser) {
        $error = "Le lecteur sélectionné n'existe pas, essayez une nouvelle sélection.";
    }

}
else {
    $error = "Vous n'avez pas correctement selectionné le lecteur, essayez une nouvelle sélection.";
}

if(isset($_POST["return"])) {
  
    $bookUser = $userManager->updateBookReturn($_GET["id"]);
    
    if(!$bookUser) {
        $error = "test1";
    }

}
else {
    $error = "test2";
}

if(isset($_POST['confirm'])) {
    $user = $userManager->deleteUser($_GET["id"]);

    if($user) {
        header("Location: users.php");
        exit;
    }
}

include "view/userView.php";
