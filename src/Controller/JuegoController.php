<?php

declare(strict_types=1);

namespace Controller;

use Core\Pages;
use Models\JuegoModel;
use Request\formSubirJuegoRequest;

class JuegoController
{
  private Pages $pages;
  private JuegoModel $juegos;

  public function __construct()
  {
    $this->pages = new Pages();

    require_once __DIR__ . '/../Models/Juego.php';

    $this->juegos = new JuegoModel(RUTA_JUEGOS, RUTA_UPLOADS);
  }

  public function subir(): void
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

      $this->loadView("subir_juego", [
        'pageTitle' => 'Subir',
        'errores' => [],
        'datos' => [],
        'categorias' => CATEGORIAS
      ]);

      return;
    }

    $request = new formSubirJuegoRequest($_POST, $_FILES);

    if (!$request->esValido()) {
      $this->loadView("subir_juego", [
        'pageTitle' => 'Subir',
        'errores' => $request->errores(),
        'datos' => $request->datos(),
        'categorias' => CATEGORIAS
      ]);

      return;
    }

    $this->juegos->guardar([
      'titulo' => $request->titulo(),
      'descripcion' => $request->descripcion(),
      'autor' => 'invitado',
      'categoria' => $request->categoria(),
      'nombre_original' => $request->nombreOriginal()
    ], $request->rutaTemporal());

    header('Location: index.php?action=juegos');
    exit;
  }

  public function listar(): void
  {
    $arrayJuegos = $this->juegos->todos();

    $this->loadView("juegos", [
      'juegos' => $arrayJuegos,
      'pageTitle' => 'Juegos'
    ]);
  }

  public function loadView(string $view, ?array $juegos = null): void
  {
    $this->pages->render($view, $juegos);
  }

  public function logout(): void
  {
    header('Location: index.php?action=home');
    exit;
  }
}

