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
    $arrayJuegos = [
      array(
        "titulo" => "Juego 1",
        "descripcion" => "Des 1",
        "autor" => "aut 1",
        "categoria" => "cat 1",
        "archivo" => "rut arch 1",
        "nombre_original" => "dragon.zip"
      ),
      array(
        "titulo" => "Juego 2",
        "descripcion" => "Des 2",
        "autor" => "aut 2",
        "categoria" => "cat 2",
        "archivo" => "rut arch 2",
        "nombre_original" => "dragon.zip"
      ),
      array(
        "titulo" => "Juego 3",
        "descripcion" => "Des 3",
        "autor" => "aut 3",
        "categoria" => "cat 3",
        "archivo" => "rut arch 3",
        "nombre_original" => "dragon.zip"
      ),
    ];
    $this->loadView("juegos", ['juegos' => $arrayJuegos]);
  }

  public function loadView(string $view, ?array $juegos = null): void
  {
    $this->pages->render($view, $juegos);
  }

  public function logout(): void
  {
    echo "logout";
  }
}
