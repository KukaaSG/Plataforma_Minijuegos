<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/list.css">
</head>

<body>
  <!-- <h1>Lista Juegos</h1> -->
  <div class="cards">
    <?php if (count($juegos) > 0): ?>
      <?php foreach ($juegos as $juego): ?>
        <div class="gameCard">
          <h2><?= $juego['titulo'] ?></h2>
          <div class="gameContent" id="descripcion">
            <h3>Descripcion:</h3>
            <p> <?= $juego['descripcion'] ?></p>
          </div>
          <div class="gameContent" id="gameAutor">
            <h3>Autor: </h3>
            <p> <?= $juego['autor'] ?></p>
          </div>
          <a href="<?= $juego['archivo'] ?>"><?= $juego['nombre_original'] ?></a>
        </div>
      <?php endforeach; ?>
    <?php elseif (count($juegos) === 0): ?>
      <div class="noGamesError">
        <h2>No hay juegos, todovía</h2>
      </div>
    <?php endif; ?>
  </div>
</body>

</html>
