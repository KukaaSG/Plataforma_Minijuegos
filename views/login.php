<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <title>Login</title>
</head>

<body>
  <div class="login">
    <h1>!Logeate¡</h1>
    <form action="?action=login" method="POST">
      <div class="loginForm">
        <div class="loginInputs">
          <div>
            <label for="correo">Correo</label>
            <input type="text" id="correo" name="correo" placeholder="correo@email.com" value="">
          </div>

          <div>
            <label for="contraseña">Contraseña</label>
            <input type="text" id="contraseña" name="contraseña" placeholder="Contraseña" value="">
          </div>
        </div>
        <button type="submit" name="enviar">Login</button>
      </div>
    </form>
  </div>
</body>

</html>
