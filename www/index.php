<?php
session_start(); // global
define("SITE_URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

try {
    if (empty($_GET['page'])) {
        require 'views/home.view.php'; // page par défaut
    } else {
        // $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $url = explode("/", $_GET['page']);
        switch ($url[0]) {
            default:
                throw new Exception("La page n'existe pas."); // page d'erreur
                break;
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    $livresController->afficherPageError($msg);
}