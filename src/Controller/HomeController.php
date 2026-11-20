
<?php

declare(strict_types=1);

namespace Controller;

use Core\Pages;
use Controller\JuegoController;

class HomeController
{
  private Pages $pages;
  private JuegoController $juegoController;

  public function __construct()
  {
    $this->pages = new Pages();
    $this->juegoController = new JuegoController();
  }

  public function index(): void
  {
    $usuario = $_GET['bienvenido'] ?? null;

    if ($usuario !== null && trim((string)$usuario) === '') {
      $usuario = null;
    }

    $this->pages->render("home", [
      'pageTitle' => 'Home',
      'usuario' => $usuario
    ]);
  }
}

