<?php

require "model/dataBase.php";

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
    $query = $this->db->query("SELECT * FROM Livre ");
    $books = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($books as $key => $book) {
      $books[$key] = new Book($book);
    }
    return $books;
  }

  // Récupère un livre
  public function getBook() {

  }

  // Ajoute un nouveau livre
  public function addBook() {

  }

  // Met à jour le statut d'un livre emprunté
  public function updateBookStatus() {

  }

}
