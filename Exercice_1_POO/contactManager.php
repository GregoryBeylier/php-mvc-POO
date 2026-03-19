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

    // Méthode pour récupérer un contact par son ID ou son nom
    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $contact = new contact();
            $contact->setId($row['id']);
            $contact->setName($row['name']);
            $contact->setEmail($row['email']);
            $contact->setPhone($row['phone_number']);
            return $contact;
        } else {
            echo "contact non trouvé.\n";
            return null;
        }
    }

    // Méthode pour créer un nouveau contact
    public function createContact($name, $email, $phone)
    {
        $stmt = $this->pdo->prepare("INSERT INTO contacts (name, email, phone_number) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $phone]);
    }

    // Méthode pour supprimer un contact par son ID
    public function deleteContact($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Méthode pour mettre à jour un contact existant
    public function modifyContact($id, $name, $email, $phone)
    {
        $stmt = $this->pdo->prepare("UPDATE contacts SET `name` = ?, email = ?, phone_number = ? WHERE id = ?");
        $stmt->execute([$name, $email, $phone, $id]);
    }
}
