<?php

// Fichier : bdd.php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class DBConnect
{
    public function getPdo()
    {
        try {
            $pdo = new PDO(
                'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'] . ';charset=utf8',
                $_ENV['DB_USER'],
                $_ENV['DB_PASS']
            );
        } catch (PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }

        return $pdo;
    }
}
