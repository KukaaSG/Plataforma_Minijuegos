<?php

declare(strict_types=1);

namespace Models;

class Juego
{
  private string $rutaJson;
  private string $rutaUploads;

  // Para utilizar el modelo se le tiene que pasar la ruta en la que se guarda el JSON del juego (rutaJson) y la ruta de donde se va a subir permanentemente (rutaUploads)
  public function __construct(string $rutaJson, string $rutaUploads)
  {
    $this->rutaJson = $rutaJson;
    $this->rutaUploads = $rutaUploads;
  }

  // Devuelve la lista de juegos.
  public function todos(): array
  {
    // Si el fichero no existe o está vacío, devuelve un array vacío.
    if (!file_exists($this->rutaJson)) {
      return [];
    }

    $json = file_get_contents($this->rutaJson);
    if ($json === false || trim($json) === '') {
      return [];
    }

    // Y Si el JSON está corrupto lanza JsonException que lo captura el FrontController como error 500.
    return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
  }


  //Guarda el ZIP y registra el juego en el JSON.
  // IMPORTANTE: $datos debe traer: titulo, descripcion, autor, categoria, nombre_original.
  public function guardar(array $datos, string $rutaTemporal): void
  {
    // Crea la carpeta de subidas si no existe
    if (!is_dir($this->rutaUploads) && !mkdir($this->rutaUploads, 0775, true) && !is_dir($this->rutaUploads)) {
      throw new \RuntimeException("No se pudo crear el directorio de subidas: {$this->rutaUploads}");
    }

    // Le da un nombre único propio: fecha + nombre saneado
    $nombreUnico = date('Ymd_His') . '_' . basename($datos['nombre_original']);

    // Mueve el fichero temporal a su destino definitivo
    $destino = rtrim($this->rutaUploads, '/\\') . DIRECTORY_SEPARATOR . $nombreUnico;
    if (!move_uploaded_file($rutaTemporal, $destino)) {
      throw new \RuntimeException('No se pudo guardar el archivo subido.');
    }

    // Registra el juego (la ruta es relativa a public/)
    $juegos = $this->todos();
    $juegos[] = [
      'titulo' => $datos['titulo'],
      'descripcion' => $datos['descripcion'],
      'autor' => $datos['autor'],
      'categoria' => $datos['categoria'],
      'archivo' => 'uploads/juegos/' . $nombreUnico,
      'nombre_original' => $datos['nombre_original'],
    ];

    $carpetaJson = dirname($this->rutaJson);
    if (!is_dir($carpetaJson) && !mkdir($carpetaJson, 0775, true) && !is_dir($carpetaJson)) {
      throw new \RuntimeException("No se pudo crear el directorio: {$carpetaJson}");
    }

    $resultado = file_put_contents(
      $this->rutaJson,
      json_encode($juegos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
      LOCK_EX
    );
    if ($resultado === false) {
      throw new \RuntimeException("No se pudo escribir en el archivo: {$this->rutaJson}");
    }
  }
}
