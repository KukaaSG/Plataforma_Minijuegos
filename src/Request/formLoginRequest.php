<?php

declare(strict_types=1);

namespace Request;

class formLoginRequest
{
  private array $post;
  private array $errores = [];

  public function __construct(array $post)
  {
    $this->post = $post;
  }

  public function esValido(): bool
  {
    if ($this->email() === '') {
      $this->errores['email'] = 'El correo es obligatorio';
    }

    if ($this->password() === '') {
      $this->errores['password'] = 'La contraseña es obligatoria';
    }

    return $this->errores === [];
  }

  public function email(): string
  {
    return trim($this->post['correo'] ?? '');
  }

  public function password(): string
  {
    return $this->post['contraseña'] ?? '';
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
    return ['email' => $this->email()];
  }
}
