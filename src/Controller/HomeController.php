<?php

declare(strict_types=1);

namespace Controller;

use Core\Pages;
use Controller\JuegoController;

/* use views\ */

class HomeController
{
  private Pages $pages;
  private JuegoController $juegoController;

  public function __construct()
  {
    $this->pages = new Pages();
    $this->juegoController = new JuegoController();
  }

  // Obtiene la pagina home
  public function index(): void
  {
    $this->pages->render("home", ['pageTitle' => 'Home']);
  }
}
