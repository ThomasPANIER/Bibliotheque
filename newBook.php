
<?php
require "model/dataBase.php";
require "model/bookManager.php";

$bookManager = new BookManager();

if(!empty($_POST) && isset($_POST["addBook"])) {

    foreach($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars($value);
    }
    if(empty($_POST["titre"])) {
        $error1 = "Vous n'avez pas rentré de titre";
    }
    else {
        $error1 = false;
    }
    if(empty($_POST["auteur"])) {
        $error2 = "Vous n'avez pas rentré le nom de l'auteur";
    }
    else {
        $error2 = false;
    }
    if(empty($_POST["categorie"])) {
        $error3 = "Vous n'avez pas rentré de catégorie";
    }
    else {
        $error3 = false;
    }
    if(empty($_POST["synopsis"])) {
        $error4 = "Vous n'avez pas rentré de résumé";
    }
    else {
        $error4 = false;
    }
    //var_dump($book);
    //$error = [$error1, $error2, $error3, $error4];
    //var_dump($error);
    if(!$error1 && !$error2 && !$error3 && !$error4) {
        
        $book = new Book($_POST);

        if($bookManager->addBook($book)) {
            header("Location:index.php");
            exit;
        }
    }

}

include "view/newBookView.php";

?>