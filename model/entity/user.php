<?php
// Classe représetant les utilisateurs stockés en base de données
class User {

    protected $id;
    protected $nom;
    protected $prenom;
    protected $carte_numero;

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

    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }
    public function getNom() : string {
        return $this->nom;
    }

    public function setPrenom(string $prenom) {
        $this->prenom = $prenom;
    }
    public function getPrenom() : string {
        return $this->prenom;
    }

    public function setCarte_numero($carte_numero) {
        $this->carte_numero = $carte_numero;
    }
    public function getCarte_numero() {
        return $this->carte_numero;
    }

}
