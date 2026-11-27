<?php

declare(strict_types=1);

namespace Request;

/**
 * Clase base de todas las Request.
 * Guarda los datos recibidos, acumula errores y ofrece utilidades comunes.
 */
abstract class Request
{
  /** @var array<string,string> campo => mensaje */
  protected array $errores = [];

  /** @var array<string,mixed> datos ya limpios (para repintar el formulario) */
  protected array $datos = [];

  /** Cada Request hija define aquí sus reglas y rellena $errores. */
  abstract protected function validar(): void;

  /** Valida (una sola vez) y dice si no hay errores. */
  public function esValido(): bool
  {
    $this->errores = [];
    $this->validar();
    return $this->errores === [];
  }

  public function agregarError(string $campo, string $mensaje): void
  {
    $this->errores[$campo] = $mensaje;
  }

  public function errores(): array
  {
    return $this->errores;
  }

  public function datos(): array
  {
    return $this->datos;
  }

  /** Lee un campo de texto de un array, lo recorta y garantiza un string. */
  protected function limpiar(array $origen, string $clave): string
  {
    $valor = $origen[$clave] ?? '';
    return is_string($valor) ? trim($valor) : '';
  }
}
