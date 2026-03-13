<?php
require 'classBdd.php';

// Instanciation de la classe DBConnect et récupération de la connexion PDO
$db = new DBConnect();
$pdo = $db->getPDO();

// Boucle pour lire les commandes de l'utilisateur
while (true) {
    $line = readline("Entrez votre commande : ");
    echo "Vous avez saisi : $line\n";

    if ($line === "list") {
        echo "affichage de la liste...\n";
    }
}
