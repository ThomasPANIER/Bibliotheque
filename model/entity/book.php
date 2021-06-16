<?php
// Classe représetant les livres stockés en base de données
class Book {

    protected $id;
    protected $nom;
    protected $auteur;
    protected $categorie;
    protected $synopsis;
    protected $statut;
    protected $lecteur_id;
    protected $date_pret;

    public function __construct(?array $data = null)
    {
        if($data) {
            foreach($data as $key => $value) {
                $setter= "set". ucfirst($key);
                if(method_exists($this, $setter)) {
                    $this->$setter(htmlspecialchars($value));
                }
            }
        }
    }

    public function setId(int $id) {
        $this->id = $id;
    }
    public function getId() : int {
        return $this->id;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }
    public function getNom() : string {
        return $this->nom;
    }

    public function setAuteur(string $auteur) {
        $this->auteur = $auteur;
    }
    public function getAuteur() : string {
        return $this->auteur;
    }

    public function setCategorie(string $categorie) {
        $this->categorie = $categorie;
    }
    public function getCategorie() : string {
        return $this->categorie;
    }

    public function setSynopsis(string $synopsis) {
        $this->synopsis = $synopsis;
    }
    public function getSynopsis() : string {
        return $this->synopsis;
    }

    public function setStatut(bool $statut) {
        $this->statut = $statut;
    }
    public function getStatut() : bool {
        return $this->statut;
    }

    public function setLecteur_id($lecteur_id) {
        $this->lecteur_id = $lecteur_id;
    }
    public function getLecteur_id() {
        return $this->lecteur_id;
    }

    public function setDate_pret(string $date_pret) {
        $this->date_pret = $date_pret;
    }
    public function getDate_pret() : string {
        return $this->date_pret;
    }

    


}
