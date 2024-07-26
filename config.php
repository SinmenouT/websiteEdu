<?php
// Informations de connexion à la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_site');
define('DB_USER', 'root');
define('DB_PASS', '');

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Autres configurations globales
define('SITE_NAME', 'Gestion des Concours');
define('ADMIN_EMAIL', 'admin@example.com');

// Fonction pour nettoyer les entrées utilisateur
function cleanInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Fonction pour générer un numéro de ticket unique
function generateTicketNumber()
{
    return uniqid('TICKET_', true);
}

// Fonction pour valider une adresse email
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Fonction pour formater la date
function formatDate($date, $format = 'Y-m-d')
{
    $dateObj = new DateTime($date);
    return $dateObj->format($format);
}

// Ajouter d'autres fonctions utiles selon vos besoins
