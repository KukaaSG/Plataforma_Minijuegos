<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <div class="login">
    <h1>!Logeate¡</h1>
    <?php if (!empty($mensaje)): ?>
      <p class="mensaje"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>
    <?php if (!empty($errores['general'])): ?>
      <p class="error"><?= htmlspecialchars($errores['general']) ?></p>
    <?php endif; ?>
    <form action="?action=login" method="POST">
      <div class="loginForm">
        <div class="loginInputs">
          <div>
            <label for="correo">Correo</label>
            <input type="text" id="correo" name="correo" placeholder="correo@email.com" value="<?= htmlspecialchars($datos['email'] ?? '') ?>">
            <?php if (isset($errores['email'])): ?><span class="error"><?= htmlspecialchars($errores['email']) ?></span><?php endif; ?>
          </div>

          <div>
            <label for="contraseña">Contraseña</label>
            <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña">
            <?php if (isset($errores['password'])): ?><span class="error"><?= htmlspecialchars($errores['password']) ?></span><?php endif; ?>
          </div>
        </div>
        <button type="submit" name="enviar">Login</button>
      </div>
    </form>
  </div>
</body>

</html>
