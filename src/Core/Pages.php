<?php
// - Funcionalidad: cargar y maquetar (el header, body y footer ) de las vistas
//
// - Implementación: Los controladores llaman pages para poder manejar las vistas
//
// - Esquema de relación:
//  views/home <-> Pages:render(string pageName, arrayArgs) <-> HomeController:index <-> Modelo
//  views/registro <-> Pages:render(string pageName, arrayArgs) <-> AuthController:registro <-> Modelo
//  views/login <-> Pages:render(string pageName, arrayArgs) <-> AuthController:login <-> Modelo
//  views/subir_juego <-> Pages:render(string pageName, arrayArgs) <-> JuegoController:subir <-> Modelo
//  views/juegos <-> Pages:render(string pageName, arrayArgs) <-> JuegoController:subir <-> Modelo
//
declare(strict_types=1);

namespace Core;

class Pages
{
  private const string VIEWS_DIR = __DIR__ . '/../../views/';

  public function render(string $pageName): void
  {
    require self::VIEWS_DIR . $pageName . '.php';
  }
}
