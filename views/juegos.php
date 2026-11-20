<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Juegos</title>
</head>

<body>
  <h1>Lista Juegos</h1>
  <?php foreach ($juegos as $juego): ?>
    <div>
      <h2><?= $juego['titulo'] ?></h2>
      <p> <?= $juego['descripcion'] ?></p>
      <p> <?= $juego['autor'] ?></p>
      <p> <?= $juego['archivo'] ?></p>
    </div>
  <?php endforeach; ?>
</body>

</html>
