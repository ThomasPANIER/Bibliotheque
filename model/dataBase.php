<?php
// Classe pour se connecter à la base de données
// Son usage n'est pas obligatoire, vous pouvez faire sans

abstract class DataBase {

    const HOST  = "localhost";
    const NAME = "bibliotheque";
    const LOGIN = "root";
    const PASSWORD = "";

    public static function bddConnect() {
        try {
            $db = new PDO("mysql:host=" . self::HOST .";dbname=" . self::NAME , self::LOGIN, self::PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }

        catch(\Exception $error) {
            echo "Erreur de connexion à la base de donnée: " . $error->getMessage() . "<br/>";
            die();
        }
    }

}
