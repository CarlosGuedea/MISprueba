<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="/views/login/login.css" />
  </head>
  <body id="content">
    <div class="login-container">
      <h2>Registro en Cafra's</h2>
      
      <form action="/registro" method="post">
        <div class="form-group">
          <label for="usuario">Usuario:</label>
          <input type="text" id="usuario" name="nombre_usuario" required />
        </div>
        <div class="form-group">
          <label for="contraseña">Contraseña:</label>
          <input type="password" id="contrasena" name="contraseña" required />
        </div>
        <div class="form-group">
            <input type="hidden" name="rol" value="Vendedor">
        </div>
        <button type="submit">Registrarse</button>
      </form>
    </div>
  </body>

</html>
