<?php

namespace Request;

class formLoginRequest extends Request
{
  private $email;
  private $password;
  public function __construct($post) {
    $this->email = mb_strtolower($this->limpiar($post, 'correo'));
    $this->password = $post['contraseña'] ?? '';
    $this->datos = [
        'email' => $this->email
    ];
  }
  protected function validar(){
    if ($this->email == '') {
        $this->agregarError('email', 'El correo es obligatorio');
    } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $this->agregarError('email', 'El correo no es válido');
    }
    if ($this->password == '') {
        $this->agregarError('password', 'La contraseña es obligatoria');
    }
  }
  public function email() {
    return $this->email;
  }
  public function password() {
    return $this->password;
  }
}
