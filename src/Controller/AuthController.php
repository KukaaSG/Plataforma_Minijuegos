<?php

declare(strict_types=1);

namespace Controller;

use Core\Pages;

class AuthController
{
  private Pages $pages;

  public function __construct()
  {
    $this->pages = new Pages();
  }

  public function login(): void
  {
    $this->loadView("login");

    // Esto lo podeis eliminar
    // Solo lo hice para ver si llegaban bien las cosas
    // del formulario de las vistas
    /* echo "<br>"; */
    /* echo $_POST['correo'] . ' login'; */
    /* echo "<br>"; */
    /* echo $_POST['contraseña'] . ' login'; */
  }

  public function registro(): void
  {
    $this->loadView("registro");

    // Esto lo podeis eliminar
    // Solo lo hice para ver si llegaban bien las cosas
    // del formulario de las vistas
    /* echo "<br>"; */
    /* echo $_POST['correo'] . ' registro'; */
    /* echo "<br>"; */
    /* echo $_POST['nickname'] . 'registro'; */
    /* echo "<br>"; */
    /* echo $_POST['contraseña'] . 'registro'; */
    /* echo "<br>"; */
    /* echo $_POST['contraseñaCon'] . 'registro'; */
  }

  public function loadView(string $view): void
  {
    $this->pages->render($view);
  }
}
