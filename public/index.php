<?php
include '../vendor/autoload.php';

session_start();

//récupération de l'URL (composante)
$url = parse_url($_SERVER["REQUEST_URI"]);

//extraction du path
$path = isset($url["path"]) ? $url["path"] : "/";

//importer les variables d'environnement 
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

//importer
use App\Controller\HomeController;

//instancier les controllers
$homeController = new HomeController();

//test des valeurs du path
switch ($path) {
    case '/':
        $homeController->home();
        break;
    case '/register':
        echo "register";
        break;
    default:
        echo "Erreur 404";
        break;
    case '/login':
        $message = "Adresse email ou mot de passe incorrect.";
        require '../template/template_login.php';
        break;
        
}
