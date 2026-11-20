
<?php

declare(strict_types=1);

namespace Controller;

use Core\Pages;
use Models\Jugador;
use Request\formRegistroRequest;
use Request\formLoginRequest;

class AuthController
{
  private Pages $pages;
  private Jugador $jugador;

  public function __construct()
  {
    $this->pages = new Pages();
    $this->jugador = new Jugador(RUTA_JUGADORES);
  }

  public function login(): void
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

      $mensaje = '';

      if (isset($_GET['registrado'])) {
        $mensaje = 'Registro correcto, ya puedes iniciar sesión';
      }

      $this->pages->render("login", [
        'pageTitle' => 'Login',
        'errores' => [],
        'datos' => [],
        'mensaje' => $mensaje
      ]);

      return;
    }

    $request = new formLoginRequest($_POST);

    if ($request->esValido()) {

      $usuario = $this->jugador->verificarCredenciales(
        $request->email(),
        $request->password()
      );

      if ($usuario === null) {
        $request->agregarError('general', 'Email o contraseña incorrectos');
      }
    }

    if ($request->errores()) {
      $this->pages->render("login", [
        'pageTitle' => 'Login',
        'errores' => $request->errores(),
        'datos' => $request->datos(),
        'mensaje' => ''
      ]);

      return;
    }

    header('Location: index.php?' . http_build_query([
      'action' => 'home',
      'bienvenido' => $usuario['username']
    ]));
    exit;
  }

  public function registro(): void
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

      $this->pages->render("registro", [
        'pageTitle' => 'Registro',
        'errores' => [],
        'datos' => []
      ]);

      return;
    }

    $request = new formRegistroRequest($_POST);

    if ($request->esValido()) {

      if ($this->jugador->existeUsername($request->username())) {
        $request->agregarError('username', 'Ese usuario ya existe');
      }

      if ($this->jugador->existeEmail($request->email())) {
        $request->agregarError('email', 'Ese correo ya está registrado');
      }
    }

    if ($request->errores()) {
      $this->pages->render("registro", [
        'pageTitle' => 'Registro',
        'errores' => $request->errores(),
        'datos' => $request->datos()
      ]);

      return;
    }

    $this->jugador->crear(
      $request->username(),
      $request->email(),
      $request->password()
    );

    header('Location: index.php?action=login&registrado=1');
    exit;
  }

  public function logout(): void
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $_SESSION = [];

    session_destroy();

    header('Location: index.php?action=home');
    exit;
  }
}

