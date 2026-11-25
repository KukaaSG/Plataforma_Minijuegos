<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <div class="login">
    <h1>!Logeate¡</h1>
<<<<<<< HEAD
    <?php if (!empty($mensaje)): ?>
      <p class="mensaje"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>
    <?php if (!empty($errores['general'])): ?>
      <p class="error"><?= htmlspecialchars($errores['general']) ?></p>
    <?php endif; ?>
=======
>>>>>>> 934f177d6a363cb90b9f59934b3432f310a4f1d0
    <form action="?action=login" method="POST">
      <div class="loginForm">
        <div class="loginInputs">
          <div>
            <label for="correo">Correo</label>
<<<<<<< HEAD
            <input type="text" id="correo" name="correo" placeholder="correo@email.com" value="<?= htmlspecialchars($datos['email'] ?? '') ?>">
            <?php if (isset($errores['email'])): ?><span class="error"><?= htmlspecialchars($errores['email']) ?></span><?php endif; ?>
=======
            <input type="text" id="correo" name="correo" placeholder="correo@email.com" value="">
>>>>>>> 934f177d6a363cb90b9f59934b3432f310a4f1d0
          </div>

          <div>
            <label for="contraseña">Contraseña</label>
<<<<<<< HEAD
            <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña">
            <?php if (isset($errores['password'])): ?><span class="error"><?= htmlspecialchars($errores['password']) ?></span><?php endif; ?>
=======
            <input type="text" id="contraseña" name="contraseña" placeholder="Contraseña" value="">
>>>>>>> 934f177d6a363cb90b9f59934b3432f310a4f1d0
          </div>
        </div>
        <button type="submit" name="enviar">Login</button>
      </div>
    </form>
  </div>
</body>

</html>
