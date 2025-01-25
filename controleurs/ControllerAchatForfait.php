<?php

require_once 'Achat.php';
require_once '../bdd/Database.php'; // Connexion à la base de données


class ControllerAchatForfait {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection(); // Connexion à la BDD
    }

    // Afficher tous les achats
    public function afficherAchats() {
        $query = "SELECT * FROM achats";
        $result = $this->db->query($query);
        $achats = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $achats[] = new Achat(
                $row['id'],
                $row['etudiant_id'],
                $row['offre_id'],
                $row['date_achat'],
                $row['montant']
            );
        }

        return $achats;
    }

    // Créer un nouvel achat
    public function creerAchat($etudiantId, $offreId, $montant) {
        $query = "INSERT INTO achats (etudiant_id, offre_id, date_achat, montant) VALUES (:etudiant_id, :offre_id, NOW(), :montant)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':etudiant_id', $etudiantId);
        $stmt->bindParam(':offre_id', $offreId);
        $stmt->bindParam(':montant', $montant);

        if ($stmt->execute()) {
            return "Achat effectué avec succès !";
        } else {
            return "Erreur lors de l'achat !";
        }
    }

    // Associer un étudiant à une offre Internet
    public function associerEtudiantOffre($etudiantId, $offreId) {
        return $this->creerAchat($etudiantId, $offreId, 0); // Montant à 0 pour l'association
    }
}

?>
