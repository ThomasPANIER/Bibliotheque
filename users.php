<?php

// Controleur qui gère l'affichage de tous les utilisateurs
require "model/dataBase.php";
require "model/userManager.php";

$users = new UserManager();
//var_dump($users);

//$user = new User();

$showUsers = $users->getUsers();
//var_dump($showUsers);

include "view/usersView.php";
