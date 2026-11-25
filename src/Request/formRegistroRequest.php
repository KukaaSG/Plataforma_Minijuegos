<?php

declare(strict_types=1);

namespace Request;

class formRegistroRequest
{
  private array $post;
  private array $errores = [];

  public function __construct(array $post)
  {
    $this->post = $post;
  }

  public function esValido(): bool
  {
    if ($this->username() === '') {
      $this->errores['username'] = 'El nickname es obligatorio';
    }

    if ($this->email() === '') {
      $this->errores['email'] = 'El correo es obligatorio';
    }

    if ($this->password() === '') {
      $this->errores['password'] = 'La contraseña es obligatoria';
    }

    if ($this->password() !== ($this->post['RepetirContraseña'] ?? '')) {
      $this->errores['repetir'] = 'Las contraseñas no coinciden';
    }

    return $this->errores === [];
  }

  public function username(): string
  {
    return trim($this->post['nickname'] ?? '');
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
    return [
      'username' => $this->username(),
      'email'    => $this->email(),
    ];
  }
}