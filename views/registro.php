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
            <input type="text" id="correo" name="correo" placeholder="Correo">
          </div>
          <div>
            <label for="nickname">nickname</label>
            <input type="text" id="nickname" name="nickname" placeholder="Nickname">
          </div>
          <div>
            <label for="contraseña">contraseña</label>
            <input type="text" id="contraseña" name="contraseña" placeholder="Contraseña">
          </div>
          <div>
            <label for="contraseñaCon">contraseñaCon</label>
            <input type="text" id="contraseñaCon" name="contraseñaCon" placeholder="Confirmar Contraseña">
          </div>
        </div>
        <button type="submit" name="enviar" value="Enviar">Login</button>
      </div>
    </form>
  </div>
</body>

</html>
