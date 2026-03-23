<?php
require 'Commande.php';

$commandes = new Commande();


// Boucle pour lire les commandes de l'utilisateur
while (true) {
    $line = readline("Entrez votre commande : ");
    echo "Vous avez saisi : $line\n";

    if ($line === "list") {
        $commandes->list();
    } else if (preg_match('/^detail (\d+)$/', $line, $matches)) {
        $id = $matches[1];
        $commandes->detail($id);
    } else if (preg_match('/^create (.+),(.+),(.+)$/', $line, $matches)) {
        $name = htmlspecialchars($matches[1]);
        $email = htmlspecialchars($matches[2]);
        $phone = htmlspecialchars($matches[3]);
        $commandes->create($name, $email, $phone);
    } else if (preg_match('/^delete (\d+)$/', $line, $matches)) {
        $id = $matches[1];
        $commandes->delete($id);
    } else if ($line === "help") {
        $commandes->help();
    } else if (preg_match('/^modify (\d+),(.+),(.+),(.+)$/', $line, $matches)) {
        $id = $matches[1];
        $name = htmlspecialchars($matches[2]);
        $email = htmlspecialchars($matches[3]);
        $phone = htmlspecialchars($matches[4]);
        $commandes->modify($id, $name, $email, $phone);
    } else if ($line === "exit") {
        echo "Au revoir !\n";
        break;
    } else if ($line === "clear") {
        $commandes->clear();
    } else {
        echo "Commande inconnue. Tapez 'help' pour voir les commandes disponibles.\n";
    }
}
