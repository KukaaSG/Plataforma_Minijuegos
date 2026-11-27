<?php

declare(strict_types=1);

namespace Request;

abstract class Request
{
  protected array $errores = [];

  public function agregarError(string $campo, string $mensaje): void
  {
    $this->errores[$campo] = $mensaje;
  }

  public function errores(): array
  {
    return $this->errores;
  }

  abstract public function esValido(): bool;
  abstract public function datos(): array;
}