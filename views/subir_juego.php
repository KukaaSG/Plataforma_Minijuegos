<div class="subir">
  <form action="?action=subir" method="POST" enctype="multipart/form-data">

    <div>
      <label for="titulo">Título</label>
      <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($datos['titulo'] ?? '') ?>">
      <?php if (isset($errores['titulo'])): ?><span class="error"><?= htmlspecialchars($errores['titulo']) ?></span><?php endif; ?>
    </div>

    <div>
      <label for="descripcion">Descripción</label>
      <textarea id="descripcion" name="descripcion" rows="4"><?= htmlspecialchars($datos['descripcion'] ?? '') ?></textarea>
      <?php if (isset($errores['descripcion'])): ?><span class="error"><?= htmlspecialchars($errores['descripcion']) ?></span><?php endif; ?>
    </div>

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
