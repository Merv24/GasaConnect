<?php
session_start();
require_once 'Etudiant.php';

class ControllerAuthentification {
    private $etudiant;

    public function __construct() {
        $this->etudiant = new Etudiant();
    }

    public function login($email, $password) {
        $user = $this->etudiant->validateCredentials($email, $password);

        if ($user) {
            // Stocker les informations dans la session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            return true;
        } else {
            return false;
        }
    }

    public function logout() {
        // Supprimer toutes les variables de session
        session_unset();
        session_destroy();
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
}
?>
