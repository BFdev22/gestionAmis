<?php
// Démarre la session PHP
session_start();
global $base_url;
$base_url = "http://localhost/gestionamis/";
$GLOBALS['isConnected'] = $_SESSION && $_SESSION["user"]; // Variable globale pour savoir si l'utilisateur est connecté
require("models/db.php"); // Connexion à la base de données
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'show':
            if (isset($_GET['id'])) {
                require("controllers/postController.php");
                showFriend($_GET['id']);
            } else {
                header("Location: $base_url");
            }

            break;
        case 'showDemand':
            require "controllers/postController.php";
            showDemand($_GET["id"]);
            break;
        case 'login':
            require("controllers/authController.php");
            showLogin();
            break;
        case 'register':
            require("controllers/authController.php");
            showRegister();
            break;
        case 'logout':
            session_destroy(); // Détruit la session
            header("Location: $base_url?page=login"); // Redirige vers la page de connexion
            break;
        default:
            require("controllers/postController.php");
            showFriends();
            break;
    }
} else {
    if($GLOBALS['isConnected'] == true) {
        require("controllers/postController.php");
        showFriends();
    } else {
        require("controllers/authController.php");
        showLogin();
    }
}
