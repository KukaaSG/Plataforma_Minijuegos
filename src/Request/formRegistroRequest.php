<?php

namespace Request;

class formRegistroRequest extends Request
{
  private $username;
  private $email;
  private $password;
  private $repetir;

  public function __construct($post)
  {
    $this->username = $this->limpiar($post, 'nickname');
    $this->email = mb_strtolower($this->limpiar($post, 'correo'));
    $this->password = is_string($post['contraseña'] ?? null) ? $post['contraseña'] : '';
    $this->repetir = is_string($post['RepetirContraseña'] ?? null) ? $post['RepetirContraseña'] : '';
    $this->datos = [
      'username' => $this->username,
      'email' => $this->email
    ];
  }
  protected function validar(): void
  {
    if ($this->username == '') {
      $this->agregarError('username', 'El nickname es obligatorio');
    } elseif (mb_strlen($this->username) < 3 || mb_strlen($this->username) > 20) {
      $this->agregarError('username', 'El nickname debe tener entre 3 y 20 caracteres');
    }
    if ($this->email == '') {
      $this->agregarError('email', 'El correo es obligatorio');
    } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $this->agregarError('email', 'El correo no es válido');
    }
    if ($this->password == '') {
      $this->agregarError('password', 'La contraseña es obligatoria');
    } elseif (strlen($this->password) < 6) {
      $this->agregarError('password', 'La contraseña debe tener al menos 6 caracteres');
    }
    if ($this->repetir != $this->password) {
      $this->agregarError('repetir', 'Las contraseñas no coinciden');
    }
  }
  public function username()
  {
    return $this->username;
  }
  public function email()
  {
    return $this->email;
  }
  public function password()
  {
    return $this->password;
  }
}
