
<?php
require "model/dataBase.php";
require "model/userManager.php";

$userManager = new UserManager();

if(!empty($_POST) && isset($_POST["addUser"])) {

    foreach($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars($value);
    }
    if(empty($_POST["nom"])) {
        $error1 = "Vous n'avez pas rentré de nom";
    }
    else {
        $error1 = false;
    }
    if(empty($_POST["prenom"])) {
        $error2 = "Vous n'avez pas rentré de prénom";
    }
    else {
        $error2 = false;
    }

    if(!$error1 && !$error2) {
        
        $user = new User($_POST);

        if($userManager->addUser($user)) {
            header("Location:users.php");
            exit;
        }
    }

}

include "view/newUserView.php";

?>