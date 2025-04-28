<?php

namespace App\Controllers;

class LoginController {

 public function login (string $title )
  {
    require_once __DIR__ . '/../Views/layouts/header.php';
    require_once __DIR__ . '/../Views/login.php';
    require_once __DIR__ . '/../Views/layouts/footer.php';
  }
   
}
