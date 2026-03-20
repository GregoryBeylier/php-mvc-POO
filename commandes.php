<?php
// Fichier contenant les commandes disponibles
require 'ContactManager.php';



class commandes
{
    private $contactManager;

    // Constructeur pour instancier 
    public function __construct()
    {
        $this->contactManager = new ContactManager();
    }
    // Méthode pour afficher la liste des contacts
    public function list()
    {
        echo "affichage de la liste de contacts \n";
        $contacts = $this->contactManager->findAll();
        foreach ($contacts as $contact) {
            echo $contact . "\n";
        }
    }
    // Méthode pour afficher les détails d'un contact
    public function detail($id)
    {
        $contact = $this->contactManager->findbyId($id);
        echo $contact . "\n";
    }
    // Méthode pour créer un nouveau contact
    public function create($name, $email, $phone)
    {
        $this->contactManager->createContact($name, $email, $phone);
        echo "contact créé avec succès !\n";
    }

    // Méthode pour supprimer un contact
    public function delete($id)
    {
        $this->contactManager->deleteContact($id);
        echo "contact supprimé avec succès !\n";
    }

    // Méthode pour afficher les commandes disponibles
    public function help()
    {
        echo "Commandes disponibles :\n";
        echo "list : afficher la liste des contacts\n";
        echo "detail <id> : afficher les détails d'un contact\n";
        echo "create <nom> <email> <téléphone> : créer un nouveau contact\n";
        echo "delete <id> : supprimer un contact\n";
        echo "help : afficher les commandes disponibles\n";
        echo "modify <id>,<nom>,<email>,<téléphone> : mettre à jour un contact\n";
        echo "exit : quitter l'application\n";
    }

    // Méthode pour mettre à jour un contact existant
    public function modify($id, $name, $email, $phone)
    {
        $this->contactManager->modifyContact($id, $name, $email, $phone);
        echo "contact mis à jour avec succès !\n";
    }

    // Méthode pour clear le terminal
    public function clear()
    {
        echo "\033[2J\033[H"; // ANSI escape code pour effacer l'écran et repositionner le curseur
    }
}
