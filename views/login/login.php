<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="/views/login/login.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input/build/css/intlTelInput.min.css">
  
</head>

<div class="login-container">
        <div class="column">
            <img src="icons/MIS_LOGO.png" alt="logo mis" class="logo">
            <p>Municipio Inteligente y Sustentable</p>
        </div>

        <div class="column-2">
            <h2>Iniciar sesión</h2>
            <form>
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Ingrese su usuario" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" required>
                </div>
                <button class="btn-sesion" type="submit">Iniciar sesión</button>
                </form>
                <hr>

                <h5>Ingresar como ciudadano</h4>

                <form action="">
                  <input type="tel" id="phone">
                  <div>
                  <button class="btn-whatsapp">Ingresar con Whatsapp</button>
                  </div>
                  
                </form>

                <h5>O continúa con</h5>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input/build/js/intlTelInput.min.js"></script>
<script src="/views/login/login.js"></script>

</html>