<?php
$host = 'localhost'; // Hôte du serveur MySQL
$user = 'root';      // Nom d'utilisateur MySQL (par défaut : root)
$password = '';      // Mot de passe MySQL (par défaut : vide dans XAMPP)
$database = 'gestion_utilisateurs'; // Nom de la base de données

// Connexion à la base de données
$conn = new mysqli($host, $user, $password, $database);

// Vérifiez la connexion
if ($conn->connect_error) {
    die('Erreur de connexion : ' . $conn->connect_error);
}
?>
