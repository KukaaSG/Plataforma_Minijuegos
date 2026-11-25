<?php

declare(strict_types=1);

namespace Request;

class formSubirJuegoRequest
{
  private array $post;
  private array $archivo;
  private array $errores = [];

  public function __construct(array $post, array $files)
  {
    $this->post = $post;
    $this->archivo = $files['archivo'] ?? [];
  }

  public function esValido(): bool
  {
    if ($this->titulo() === '') {
      $this->errores['titulo'] = 'El título es obligatorio';
    }

    if ($this->descripcion() === '') {
      $this->errores['descripcion'] = 'La descripción es obligatoria';
    }

    if (!in_array($this->categoria(), CATEGORIAS, true)) {
      $this->errores['categoria'] = 'Elige una categoría válida';
    }

    if (($this->archivo['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
      $this->errores['archivo'] = 'Debes seleccionar un archivo ZIP válido';
    } elseif (strtolower(pathinfo($this->nombreOriginal(), PATHINFO_EXTENSION)) !== 'zip') {
      $this->errores['archivo'] = 'El archivo debe ser un ZIP';
    } elseif ($this->archivo['size'] > MAX_ZIP) {
      $this->errores['archivo'] = 'El ZIP supera el tamaño máximo permitido';
    }

    return $this->errores === [];
  }

  public function titulo(): string
  {
    return trim($this->post['titulo'] ?? '');
  }

  public function descripcion(): string
  {
    return trim($this->post['descripcion'] ?? '');
  }

  public function categoria(): string
  {
    return $this->post['categoria'] ?? '';
  }

  public function nombreOriginal(): string
  {
    return basename($this->archivo['name'] ?? '');
  }

  public function rutaTemporal(): string
  {
    return $this->archivo['tmp_name'] ?? '';
  }

  public function errores(): array
  {
    return $this->errores;
  }

  public function datos(): array
  {
    return [
      'titulo'      => $this->titulo(),
      'descripcion' => $this->descripcion(),
      'categoria'   => $this->categoria(),
    ];
  }
}
