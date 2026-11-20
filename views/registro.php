<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/registro.css">
</head>

<body>
  <div class="registro">
    <h1>!Registrate¡</h1>
    <form action="?action=registro" method="POST">
      <div class="registroForm">
        <div class="registroInputs">
          <div>
            <label for="correo">Correo</label>
            <input type="email" id="correo" name="correo" placeholder="Correo">
          </div>
          <div>
            <label for="nickname">Nickname</label>
            <input type="text" id="nickname" name="nickname" placeholder="Nickname">
          </div>
          <div>
            <label for="contraseña">Contraseña</label>
            <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña">
          </div>
          <div>
            <label for="contraseñaCon">Repetir Contraseña</label>
            <input type="password" id="contraseñaCon" name="RepetirContraseña" placeholder="Confirmar Contraseña">
          </div>
        </div>
        <button type="submit" name="enviar" value="Enviar">Login</button>
      </div>
    </form>
  </div>
</body>

</html>
