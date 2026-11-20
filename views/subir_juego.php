<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/subir.css">
  <title>Subir Juegos</title>
</head>

<body>
  <div class="subirForm">
    <h1>¡SUBE TU JUEGO!</h1>
    <form action="/?action=subir" method="POST" enctype="multipart/form-data">
      <div class="select">
        <label for="archivo">Seleccione el juego a subir</label>
        <input type="file" id="archivo" name="archivo">
      </div>
      <button type="submit">Subir archivo</button>
    </form>
  </div>
</body>

</html>
