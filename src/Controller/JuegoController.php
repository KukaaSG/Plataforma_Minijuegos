<?php

declare(strict_types=1);

namespace Controller;

use Core\Pages;
use Models\JuegoModel;
use Request\formSubirJuegoRequest;

class JuegoController
{
  private $pages;
  private $juegos;

  public function __construct()
  {
    $this->pages = new Pages();
    $this->juegos = new JuegoModel(RUTA_JUEGOS, RUTA_UPLOADS);
  }

  public function subir()
  {
    echo "se mete en el index";
    $errores = [];
    $datos = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $request = new formSubirJuegoRequest($_POST, $_FILES);
      if ($request->esValido()) {
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

      $errores = $request->errores();
      $datos = $request->datos();
    }

    $this->pages->render('subir_juego', [
      'pageTitle' => 'Subir',
      'errores' => $errores,
      'datos' => $datos,
      'categorias' => CATEGORIAS
    ]);
  }

  public function listar()
  {
    $this->pages->render('juegos', [
      'juegos' => $this->juegos->todos(),
      'pageTitle' => 'Juegos'
    ]);
  }
}
