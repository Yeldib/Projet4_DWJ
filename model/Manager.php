<?php

class Manager
{
    protected $db;

    public function getConnect()
    {
        $host = "localhost";
        $dbName = "blog_jforteroche";
        $userHost = "root";
        $passHost = "";

        try {
            $this->db = new PDO(
                "mysql:host=$host;dbname=$dbName;charset=utf8;port=3308",
                "$userHost",
                "$passHost",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
