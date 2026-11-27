<div class="subir">
  <form action="?action=subir" method="POST" enctype="multipart/form-data">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/subir.css">
      <title>Subir Juegos</title>
    </head>
    <div>
      <label for="titulo">Título</label>
      <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($datos['titulo'] ?? '') ?>">
      <?php if (isset($errores['titulo'])): ?><span class="error"><?= htmlspecialchars($errores['titulo']) ?></span><?php endif; ?>
    </div>

    <body>
      <div class="subirForm">
        <h1>¡SUBE TU JUEGO!</h1>
        <form action="/?action=subir" method="POST" enctype="multipart/form-data">
          <div class="select">
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo">
            <label for="descripcion">Descripcion</label>
            <input type="textarea" id="descripcion" name="archivo">
            <label for="archivo">Seleccione el juego a subir</label>
            <input type="file" id="archivo" name="archivo">
            <label for="genero">Genero</label>
            <select id="genero" name="pais">
              <option value="aventura" selected>Aventura</option>
              <option value="puzzle">Puzzle</option>
              <option value="fps">FPS</option>
              <option value="terror">Terror</option>
              <option value="point_and_click">Point and Click</option>
              <option value="bullet_hell">Bullet Hell</option>
            </select>
          </div>
          <button type="submit">Subir archivo</button>
        </form>
      </div>
    </body>

    <div>
      <label for="categoria">Categoría</label>
      <select id="categoria" name="categoria">
        <option value="">-- Elige una --</option>
        <?php foreach ($categorias as $cat): ?>
          <option value="<?= htmlspecialchars($cat) ?>" <?= ($datos['categoria'] ?? '') === $cat ? 'selected' : '' ?>>
            <?= htmlspecialchars($cat) ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php if (isset($errores['categoria'])): ?><span class="error"><?= htmlspecialchars($errores['categoria']) ?></span><?php endif; ?>
    </div>

    <div>
      <label for="archivo">Archivo ZIP (máx. <?= MAX_ZIP / 1024 / 1024 ?> MB)</label>
      <input type="file" id="archivo" name="archivo" accept=".zip">
      <?php if (isset($errores['archivo'])): ?><span class="error"><?= htmlspecialchars($errores['archivo']) ?></span><?php endif; ?>
    </div>

    <button type="submit">Subir archivo</button>
  </form>
</div>
