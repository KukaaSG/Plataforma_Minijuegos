<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <div class="login">
    <h1>!Logeate¡</h1>
    <form action="?action=login" method="POST">
      <div class="loginForm">
        <div class="loginInputs">
          <div>
            <label for="correo">Correo</label>
            <input type="correo" id="correo" name="correo" placeholder="correo@email.com" value="">
          </div>

          <div>
            <label for="contraseña">Contraseña</label>
            <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" value="">
          </div>
        </div>
        <button type="submit" name="enviar">Login</button>
      </div>
    </form>
  </div>
</body>

</html>
