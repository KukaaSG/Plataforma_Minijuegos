<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <div class="text">
    <h1>UPLOAD</h1>
    <h1>YOUR GAMES</h1>
    <p>Repositorio público de projectos videoludicos</p>
  </div>

  <div class="homeBotones">
    <form action="?action=home" method="GET">
      <button class="homeB" type="submit" name="action" value="subir">
        Subir Juego
      </button>

      <button class="homeB" type="submit" name="action" value="juegos">
        Ver Tus Juegos
      </button>

      <button class="homeB" type="submit" name="action" value="logout">
        Cerrar Sessión
      </button>
      <div class="sesion">
        <button class="loginB" type=bsubmit" name="action" value="login">
          Inicio de Sesión
        </button>
        <button class="regisB" type=bsubmit" name="action" value="registro">
          Registrarse
        </button>
      </div>
    </form>
  </div>
</body>

</html>
