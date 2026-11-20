<?php

declare(strict_types=1);

namespace Controller;

class FrontController
{
  public static function main(): void
  {
    $action_name = $_GET['action'] ?? $_GET['accion'] ?? 'home';

    $arrayActions = [
      'home' => 'index',
      'registro' => 'registro',
      'login' => 'login',
      'logout' => 'logout',
      'subir' => 'subir',
      'juegos' => 'listar'
    ];

    $arrayControllers = [
      'home' => 'Home',
      'registro' => 'Auth',
      'login' => 'Auth',
      'logout' => 'Auth',
      'subir' => 'Juego',
      'juegos' => 'Juego'
    ];

    if (!isset($arrayActions[$action_name])) {
      ErrorController::show_error404();
      return;
    }

    $nombre_controlador = 'Controller\\' . $arrayControllers[$action_name] . 'Controller';

    if (!self::controllerExist($nombre_controlador)) {
      return;
    }

    try {
      self::callController($nombre_controlador, $arrayActions, $action_name);
    } catch (\Throwable $e) {
      ErrorController::show_error500();
    }
  }

  private static function controllerExist(string $nombre_controlador): bool
  {
    if (!class_exists($nombre_controlador)) {
      ErrorController::show_error404();
      return false;
    }

    return true;
  }

  private static function callController(
    string $nombre_controlador,
    array $arrayActions,
    string $action_name
  ): void {
    $controlador = new $nombre_controlador();

    $method = $arrayActions[$action_name];

    $controlador->$method();
  }
}

