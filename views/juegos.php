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
          <h2><?= htmlspecialchars($juego['titulo'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></h2>
          <div class="gameContent" id="descripcion">
            <h3>Descripcion:</h3>
            <p> <?= htmlspecialchars($juego['descripcion'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')  ?></p>
          </div>
          <div class="gameContent" id="gameAutor">
            <h3>Autor: </h3>
            <p> <?= htmlspecialchars($juego['autor'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')  ?></p>
          </div>
          <a href="<?= htmlspecialchars($juego['archivo'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"><?= $juego['nombre_original'] ?></a>
        </div>
      <?php endforeach; ?>
    <?php elseif (count($juegos) === 0): ?>
      <div class="noGamesError">
        <h2>Todavía no hay juegos subidos</h2>
      </div>
    <?php endif; ?>
  </div>
</body>

</html>
