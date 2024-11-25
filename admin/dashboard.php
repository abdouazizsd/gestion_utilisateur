<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirection vers la page de connexion
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Bienvenue sur le tableau de bord</h1>
    <p>Vous êtes connecté avec succès.</p>
    <a href="../logout.php">Se déconnecter</a>
</body>
</html>
