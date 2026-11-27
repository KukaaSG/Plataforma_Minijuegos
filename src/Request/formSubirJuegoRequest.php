<?php

namespace Request;

class formSubirJuegoRequest extends Request
{
  private $titulo;
  private $descripcion;
  private $categoria;
  private $archivo;
  public function __construct($post, $files)
  {
    $this->titulo = $this->limpiar($post, 'titulo');
    $this->descripcion = $this->limpiar($post, 'descripcion');
    $this->categoria = $this->limpiar($post, 'categoria');
    $this->archivo = $files['archivo'] ?? [];
    $this->datos = [
      'titulo' => $this->titulo,
      'descripcion' => $this->descripcion,
      'categoria' => $this->categoria
    ];
  }

  protected function validar(): void
  {
    if ($this->titulo == '') {
      $this->agregarError('titulo', 'El título es obligatorio');
    } elseif (mb_strlen($this->titulo) > 60) {
      $this->agregarError('titulo', 'El título no puede superar 60 caracteres');
    }

    if ($this->descripcion == '') {
      $this->agregarError('descripcion', 'La descripción es obligatoria');
    } elseif (mb_strlen($this->descripcion) > 500) {
      $this->agregarError('descripcion', 'La descripción no puede superar 500 caracteres');
    }
    if (!in_array($this->categoria, CATEGORIAS)) {
      $this->agregarError('categoria', 'Elige una categoría válida');
    }

    $error = $this->archivo['error'] ?? UPLOAD_ERR_NO_FILE;

    if ($error == UPLOAD_ERR_NO_FILE) {
      $this->agregarError('archivo', 'Debes seleccionar un archivo ZIP');
    } elseif ($error == UPLOAD_ERR_INI_SIZE || $error == UPLOAD_ERR_FORM_SIZE) {
      $this->agregarError('archivo', 'El archivo supera el tamaño máximo permitido');
    } elseif ($error != UPLOAD_ERR_OK) {
      $this->agregarError('archivo', 'Error al subir el archivo');
    } else {
      $extension = strtolower(pathinfo($this->nombreOriginal(), PATHINFO_EXTENSION));
      if ($extension != 'zip') {
        $this->agregarError('archivo', 'El archivo debe ser un ZIP');
      }
      if (($this->archivo['size'] ?? 0) > MAX_ZIP) {
        $this->agregarError('archivo', 'El ZIP supera el tamaño máximo permitido');
      }
    }
  }
  public function titulo()
  {
    return $this->titulo;
  }

  public function descripcion()
  {
    return $this->descripcion;
  }

  public function categoria()
  {
    return $this->categoria;
  }

  public function nombreOriginal()
  {
    return basename($this->archivo['name'] ?? '');
  }

  public function rutaTemporal()
  {
    return $this->archivo['tmp_name'] ?? '';
  }
}
