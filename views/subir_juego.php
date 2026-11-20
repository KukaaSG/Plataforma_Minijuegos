<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subir Juegos</title>
</head>

<body>
  <form action="/?action=subir" method="POST" enctype="multipart/form-data">
    <label for="archivo">Elige un archivo:</label>
    <input type="file" id="archivo" name="archivo">
    <button type="submit">Subir archivo</button>
  </form>
</body>

</html>
