<?php

require "model/entity/book.php";

class BookManager {

  private PDO $db;

  function __construct()
  {
    $this->db = DataBase::bddConnect();
  }

  // function __construct()
  // {
  //     $this->setDb(DataBase::bddConnect());
  // }

  // public function setDb(PDO $connection) {
  //     $this->db = $connection;
  // }

  // public function getDb() : PDO {
  //     return $this->db;
  // }

  // Récupère tous les livres
  public function getBooks() {
    $query = $this->db->query("SELECT * FROM Livre");
    $books = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($books as $key => $book) {
      $books[$key] = new Book($book);
    }
    return $books;
  }

  // Récupère un livre
  public function getBook($id) {
    $query = $this->db->prepare("SELECT * FROM Livre WHERE id=:id");
    $query->execute([
      "id" => $id
  ]);
    $book = $query->fetch(PDO::FETCH_ASSOC);
    if ($book) {
      $book = new Book($book);
    }
    return $book;
  }

  
  // Récupère un livre et son utilisateur
  public function getUserBook($id) {
    $query = $this->db->prepare(
      "SELECT Livre.*, Lecteur.*
      -- SELECT Livre.*, Lecteur.nom, Lecteur.prenom, CONVERT(Lecteur.carte_numero, int)
      FROM Livre
      LEFT JOIN Lecteur
      ON Livre.lecteur_id = Lecteur.id
      WHERE Livre.id = :id");
    $query->execute([
      "id" => $id
    ]);
    $data = $query->fetch(PDO::FETCH_ASSOC);
    if ($data) {
      $userBook = new User($data);
      return $userBook;
    }
  }

  // Ajoute un nouveau livre
  public function addBook(Book $book) : bool {
    $query = $this->db->prepare(
      "INSERT INTO Livre(titre, auteur, categorie, synopsis, statut)
      VALUES (:titre, :auteur, :categorie, :synopsis, 1)"
    );
    $result = $query->execute([
      "titre" => $book->getTitre(),
      "auteur" => $book->getAuteur(),
      "categorie" => $book->getCategorie(),
      "synopsis" => $book->getSynopsis()
    ]);
    return $result;
  }

  // Met à jour le statut d'un livre emprunté
  public function updateBookStatus() {
  
  }

  // met a jour le statut pour rendre un livre
  public function returnBook ($id) {
    $query = $this->db->prepare(
      "UPDATE Livre
      SET statut = 1, lecteur_id = NULL, date_pret = NULL
      WHERE id=:id"
    );
    $query->execute(["id" => $id]);
    return $query;
  }

  // met a jour le statut pour emprunter un livre
  public function rentBook ($id) {
    $query = $this->db->prepare(
      "UPDATE Livre
      SET statut = 0, lecteur_id = ROUND(RAND()*9)+1, date_pret = NOW()
      WHERE id=:id"
    );
    $query->execute(["id" => $id]);
    return $query;
  }

  // Supprime un livre
  public function deleteBook($id) {
    $query = $this->db->prepare("DELETE FROM Livre WHERE id=:id");
    $query->execute(["id" => $id]);
    return $query;
}

}
