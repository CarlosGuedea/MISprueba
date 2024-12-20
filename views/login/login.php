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
    <h2>Iniciar Sesión</h2>
    <h1>Hola mundo</h1>
    <div style="color:red">
      <p> <?php error_reporting(0);
            echo $Error; ?> </p>
    </div>
    <form action="/login-admin" method="post">
      <div class="form-group">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="nombre_usuario" required />
      </div>
      <div class="form-group">
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contrasena" name="contraseña" required />
      </div>
      <button type="submit">Ingresar</button>
    </form>
    <h5 style="color: gray;">-- O --</h5>
    <a href="/registro"><button type="submit">Registrarse</button></a>
  </div>
</body>

</html>