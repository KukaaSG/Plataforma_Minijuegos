<?php

namespace Controller;

use Core\Pages;
use Models\Jugador;
use Request\formRegistroRequest;
use Request\formLoginRequest;

class AuthController
{
    private $pages;
    private $jugador;

    public function __construct()
    {
        $this->pages = new Pages();
        $this->jugador = new Jugador(RUTA_JUGADORES);
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $request = new formLoginRequest($_POST);
          if ($request->esValido()) {
            $usuario = $this->jugador->verificarCredenciales(
                $request->email(),
                $request->password()
            );
            if ($usuario) {
              header('Location: index.php?action=home&bienvenido=' . urlencode($usuario['username']));
              exit;
            }
            $request->agregarError('general', 'Email o contraseña incorrectos');
          }

          $errores = $request->errores();
          $datos = $request->datos();
        } 
        else {
          $errores = [];
          $datos = [];
        }

        $mensaje = '';

        if (isset($_GET['registrado'])) {
          $mensaje = 'Registro correcto, ya puedes iniciar sesión';
        }

        $this->pages->render('login', [
            'pageTitle' => 'Login',
            'errores' => $errores,
            'datos' => $datos,
            'mensaje' => $mensaje
        ]);
    }


    public function registro(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $request = new formRegistroRequest($_POST);

            if ($request->esValido()) {

              if ($this->jugador->existeUsername($request->username())) {
                $request->agregarError('username', 'Ese usuario ya existe');
              }
              if ($this->jugador->existeEmail($request->email())) {
                $request->agregarError('email', 'Ese correo ya está registrado');
              }
              if (!$request->errores()) {
                $this->jugador->crear(
                  $request->username(),
                  $request->email(),
                  $request->password()
                );
                header('Location: index.php?action=login&registrado=1');
                exit;
              }
            }

            $errores = $request->errores();
            $datos = $request->datos();
        } 
        else{
          $errores = [];
          $datos = [];
        }

        $this->pages->render('registro', [
          'pageTitle' => 'Registro',
          'errores' => $errores,
          'datos' => $datos
        ]);
    }

    public function logout()
    {
      $_SESSION = [];
      session_destroy();
      header('Location: index.php?action=home');
      exit;
    }
}

