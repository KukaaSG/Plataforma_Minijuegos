<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ERROR 500</title>
</head>

<body>
  <h1>ERROR 500</h1>
  <h2>Error interno del servidor</h2>
  <?php if (!empty($mensaje)): ?>
    <p><?= htmlspecialchars((string) $mensaje, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></p>
  <?php endif; ?>
</body>

</html>
