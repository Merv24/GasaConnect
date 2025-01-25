<?php

class Database {
    private static $host = 'localhost'; // Remplacez par l'hôte de votre serveur
    private static $dbname = 'gasa_connect'; // Remplacez par le nom de votre base de données
    private static $username = 'root'; // Remplacez par votre nom d'utilisateur
    private static $password = ''; // Remplacez par votre mot de passe
    private static $connection = null; // Stocke l'instance PDO

    // Méthode pour obtenir la connexion à la base de données
    public static function getConnection() {
        // Vérifie si la connexion existe déjà
        if (self::$connection === null) {
            try {
                // Crée une nouvelle connexion PDO
                self::$connection = new PDO(
                    'mysql:host=' . self::$host . ';dbname=' . self::$dbname . ';charset=utf8',
                    self::$username,
                    self::$password
                );
                // Configure PDO pour lever des exceptions en cas d'erreur
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Gestion des erreurs de connexion
                die('Erreur de connexion à la base de données : ' . $e->getMessage());
            }
        }

        return self::$connection; // Retourne l'instance PDO
    }

    // Méthode pour fermer la connexion (optionnel)
    public static function closeConnection() {
        self::$connection = null;
    }
}

?>
