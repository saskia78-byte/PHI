<?php
namespace App\Models;

class Media {
    private $idMedia;
    private $image;
    private $audio;
    private $video;
    private $idArticle;
    private $idPodcast;

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
     * Get the value of idMedia
     */
    public function getIdMedia() {
        return $this->idMedia;
    }

    /**
     * Set the value of idMedia
     */
    public function setIdMedia($idMedia): self {
        $this->idMedia = $idMedia;
        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Set the value of image
     */
    public function setImage($image): self {
        $this->image = $image;
        return $this;
    }

    /**
     * Get the value of audio
     */
    public function getAudio() {
        return $this->audio;
    }

    /**
     * Set the value of audio
     */
    public function setAudio($audio): self {
        $this->audio = $audio;
        return $this;
    }

    /**
     * Get the value of video
     */
    public function getVideo() {
        return $this->video;
    }

    /**
     * Set the value of video
     */
    public function setVideo($video): self {
        $this->video = $video;
        return $this;
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
}