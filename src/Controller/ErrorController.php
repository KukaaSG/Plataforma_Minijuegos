<?php

declare(strict_types=1);

namespace Controller;

use Core\Pages;

class ErrorController
{
  public static function show_error404(): void
  {
    http_response_code(404);
    (new Pages())->render('errors/error404');
  }
}
