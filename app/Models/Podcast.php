<?php
namespace App\Models;

class Podcast {
    private $idPodcast;
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
     * Get the value of idPodcast
     */
    public function getIdPodcast() {
        return $this->idPodcast;
    }

    /**
     * Set the value of idPodcast
     */
    public function setIdPodcast($idPodcast): self {
        $this->idPodcast = $idPodcast;
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