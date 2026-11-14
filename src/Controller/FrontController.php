<?php

declare(strict_types=1);

namespace Controller;

use Controller\ErrorController;

class FrontController
{
  public static function main(): void
  {
    // Obtener acción de la url, si no hay nada llama por defecto a HomeController
    $action_name = $_GET['action'] ?? 'home';

    // Array asociativo de acciones y los metodos que deben llamar
    // Lista blanca de rutas
    $arrayActions = array(
      'home' => 'index',
      'registro' => 'registro',
      'login' => 'login',
      'logout' => 'logout',
      'subir' => 'subir',
      'juegos' => 'listar'
    );

    $nombre_controlador = 'Controller\\' . ucfirst($action_name) . 'Controller';

    // Comprueva si hay un controlador con el nombre de acción y verifica si esa acción esta en la lista blanca de rutas
    if (self::controllerExist($nombre_controlador) && key_exists($action_name, $arrayActions)) {
      // Instancia un contralador y ejecuta el metodo especificado la lista blanca de rutas
      self::callController($nombre_controlador, $arrayActions);
    }
  }

  private static function controllerExist(string $nombre_controlador): bool
  {
    if (
      !class_exists($nombre_controlador)
      || in_array(
        $nombre_controlador,
        [self::class, ErrorController::class],
        true
      )
    ) {
      ErrorController::show_error404();
      return false;
    } else {
      return true;
    }
  }

  private static function callController($nombre_controlador, $arrayActions)
  {
    $controlador = new $nombre_controlador();
    $method = $arrayActions['home'];
    $controlador->$method();
  }
}
