<?php

require "model/entity/user.php";

class UserManager {

  protected PDO $db;

  function __construct()
  {
    $this->db = DataBase::bddConnect();
  }

  // Récupère tous les utilisateurs
  public function getUsers() {
    $query = $this->db->query("SELECT * FROM Lecteur");
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($users as $key => $user) {
      $users[$key] = new User($user);
    }
    return $users;
  }

  // Récupère un utilisateur par son id
  public function getUserById($id) {
    $query = $this->db->prepare("SELECT * FROM Lecteur WHERE id=:id");
    $query->execute([
      "id" => $id
    ]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user) {
      $user = new User($user);
    }
    return $user;
  }

  // Récupère un utilisateur par son code personnel
  public function getUser() {
    $query = $this->db->query("SELECT * FROM Lecteur WHERE carte_numero");
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user) {
      $user = new User($user);
    }
    return $user;
  }

  // Récupère un utilisateur et son livre
  public function getBookUser($id) {
    $query = $this->db->prepare(
      "SELECT Livre.*, Lecteur.*
      FROM Livre
      LEFT JOIN Lecteur
      ON Livre.lecteur_id = Lecteur.id
      WHERE Lecteur.id = :id");
    $query->execute([
      "id" => $id
    ]);
    $data = $query->fetch(PDO::FETCH_ASSOC);
    if ($data) {
      $userBook = new Book($data);
      return $userBook;
    }
  }

  // Met à jour le statut d'un livre emprunté
  public function updateBookReturn($id) {
    $query = $this->db->prepare(
      "SELECT Lecteur.id, Livre.* 
      FROM Lecteur
      LEFT JOIN Livre
      ON Lecteur.id = Livre.lecteur_id
      WHERE Lecteur.id = :id");
    $query->execute([
      "id" => $id
    ]);
    $data = $query->fetch(PDO::FETCH_ASSOC);
    $book = new Book($data);     
    if($book->getLecteur_id()) {
      $query = $this->db->prepare(
        "UPDATE Livre
        SET statut = 1, lecteur_id = NULL, date_pret = NULL 
        WHERE lecteur_id=:id"
      );
      $query->execute(["id" => $id]);
      $book = $query->fetch(PDO::FETCH_ASSOC);
      return $book;
    }    
  }

  // Ajoute un nouveau lecteur
  public function addUser(User $user) : bool {
    $query = $this->db->prepare(
      "INSERT INTO Lecteur(nom, prenom, carte_numero)
      VALUES (:nom, :prenom, RAND()*1000000)"
    );
    $result = $query->execute([
      "nom" => $user->getNom(),
      "prenom" => $user->getPrenom()
    ]);
    return $result;
  }

  // Supprime un lecteur
  public function deleteUser($id) {
    $query = $this->db->prepare("DELETE FROM Lecteur WHERE id=:id");
    $query->execute(["id" => $id]);
    return $query;
  }
}
