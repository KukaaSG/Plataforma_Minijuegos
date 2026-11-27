<?php

declare(strict_types=1);

namespace Controller;

class FrontController
{
  public static function main()
  {
    $action = $_GET['action'] ?? 'home';
    $acciones = [
      'home' => ['HomeController', 'index'],
      'registro' => ['AuthController', 'registro'],
      'login' => ['AuthController', 'login'],
      'logout' => ['AuthController', 'logout'],
      'subir' => ['JuegoController', 'subir'],
      'juegos' => ['JuegoController', 'listar']
    ];
    if (!isset($acciones[$action])) {
      ErrorController::show_error404();
      return;
    }
    $controlador = 'Controller\\' . $acciones[$action][0];
    $metodo = $acciones[$action][1];
    if (!class_exists($controlador)) {
      ErrorController::show_error404();
      return;
    }
    try {
      $objeto = new $controlador();
      $objeto->$metodo();
    } catch (\Throwable $e) {
      error_log((string) $e);
      ErrorController::show_error500(
        get_class($e) . ': ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine()
      );
    }
  }
}
