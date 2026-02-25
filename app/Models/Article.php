<?php
namespace App\Models;

class Article {
    private $idArticle;
    private $titre;
    private $description;
    private $dateAjout;
    private $idUser;

    public function __construct($valeur = [])
    {
        if(!empty($valeur)) {
            $this->hydrate($valeur);
        }
    }

    public function hydrate($donnees) {
        foreach($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method)) {
                $this->$method($value);
            }else{
                echo $method." introuvable";
            }
        }
    }

    /**
     * Get the value of idArticle
     */
    public function getIdArticle() {
        return $this->idArticle;
    }

    /**
     * Set the value of idArticle
     */
    public function setIdArticle($idArticle): self {
        $this->idArticle = $idArticle;
        return $this;
    }

    /**
     * Get the value of titre
     */
    public function getTitre() {
        return $this->titre;
    }

    /**
     * Set the value of titre
     */
    public function setTitre($titre): self {
        $this->titre = $titre;
        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description): self {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the value of dateAjout
     */
    public function getDateAjout() {
        return $this->dateAjout;
    }

    /**
     * Set the value of dateAjout
     */
    public function setDateAjout($dateAjout): self {
        $this->dateAjout = $dateAjout;
        return $this;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser() {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     */
    public function setIdUser($idUser): self {
        $this->idUser = $idUser;
        return $this;
    }
}