<?php

declare(strict_types=1);

namespace Controller;

use Core\Pages;

class ErrorController
{
  public static function show_error404(): void {
    http_response_code(404);

    (new Pages())->render('errors/error404', [
      'pageTitle' => 'Error 404'
    ]);
  }

  public static function show_error500(string $mensaje = 'Ha ocurrido un error interno'): void {
    http_response_code(500);

    (new Pages())->render('errors/error505', [
      'pageTitle' => 'Error 500',
      'mensaje' => $mensaje
    ]);
  }
}
