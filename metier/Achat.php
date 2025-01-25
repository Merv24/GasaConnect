<?php

class Achat {
    private $id;
    private $etudiantId; // Référence à l'étudiant
    private $offreId;    // Référence à l'offre internet
    private $dateAchat;
    private $montant;

    // Constructeur
    public function __construct($id, $etudiantId, $offreId, $dateAchat, $montant) {
        $this->id = $id;
        $this->etudiantId = $etudiantId;
        $this->offreId = $offreId;
        $this->dateAchat = $dateAchat;
        $this->montant = $montant;
    }

    // Getters et setters
    public function getId() {
        return $this->id;
    }

    public function getEtudiantId() {
        return $this->etudiantId;
    }

    public function setEtudiantId($etudiantId) {
        $this->etudiantId = $etudiantId;
    }

    public function getOffreId() {
        return $this->offreId;
    }

    public function setOffreId($offreId) {
        $this->offreId = $offreId;
    }

    public function getDateAchat() {
        return $this->dateAchat;
    }

    public function setDateAchat($dateAchat) {
        $this->dateAchat = $dateAchat;
    }

    public function getMontant() {
        return $this->montant;
    }

    public function setMontant($montant) {
        $this->montant = $montant;
    }
}

?>
