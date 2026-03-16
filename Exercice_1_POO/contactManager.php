<?php
require 'DBConnect.php';

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
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
