<?php

namespace App\Models;
use Core\Database;
use PDO;

class CommandeModel
{

    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    

   
}