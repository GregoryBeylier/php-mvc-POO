<?php
require 'classBdd.php';

class ContactManager
{
    private $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
}
