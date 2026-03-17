<?php
require 'contactManager.php';

$contactManager = new ContactManager();


// Boucle pour lire les commandes de l'utilisateur
while (true) {
    $line = readline("Entrez votre commande : ");
    echo "Vous avez saisi : $line\n";

    if ($line === "list") {
        echo "affichage de la liste...\n";
        $contacts = $contactManager->findAll();
        foreach ($contacts as $contact) {
            echo $contact . "\n";
        }
    }
}
