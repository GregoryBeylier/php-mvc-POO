<?php

// Fichier : bdd.php
class DBconnect
{
    public function getPDO()
    {
        try {
            $pdo = new PDO(
                'mysql:host=localhost;dbname=gestion_de_contacts;charset=utf8',
                'root',
                ''
            );
        } catch (PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }

        return $pdo;
    }
}
