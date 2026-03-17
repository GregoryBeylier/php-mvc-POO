<?php
require 'DBConnect.php';
require 'contact.php';

class ContactManager
{
    private $pdo;

    // Constructeur pour initialiser la connexion PDO
    public function __construct()
    {
        $db = new DBConnect();
        $this->pdo = $db->getPdo();
    }

    // Méthode pour récupérer tous les contacts
    public function findAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM contacts");
        $resulat = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $contacts = [];

        foreach ($resulat as $row) {
            $contact = new contact();
            $contact->setId($row['id']);
            $contact->setName($row['name']);
            $contact->setEmail($row['email']);
            $contact->setPhone($row['phone_number']);
            $contacts[] = $contact;
        }

        return $contacts;
    }
}
