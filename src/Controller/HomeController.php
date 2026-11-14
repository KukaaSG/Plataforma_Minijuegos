<?php

declare(strict_types=1);

namespace Controller;

use Core\Pages;

/* use views\ */

class HomeController
{
  private Pages $pages;

  public function __construct()
  {
    $this->pages = new Pages();
  }

  // Obtiene la pagina home
  public function index(): void
  {
    $this->pages->render("home");
  }
}
