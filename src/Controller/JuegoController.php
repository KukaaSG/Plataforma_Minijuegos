<?php

declare(strict_types=1);

namespace Controller;

use Core\Pages;

class JuegoController
{
  private Pages $pages;

  public function __construct()
  {
    $this->pages = new Pages();
  }

  public function subir(): void
  {
    $this->loadView("subir_juego");
  }

  public function listar(): void
  {
    $this->loadView("juegos");
  }

  public function loadView(string $view): void
  {
    $this->pages->render($view);
  }
}
