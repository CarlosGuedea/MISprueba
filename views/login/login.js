  // Inicialización de la biblioteca
  var input = document.querySelector("#phone");
  var iti = window.intlTelInput(input, {
    initialCountry: "mx", // Puedes establecer el país inicial
    preferredCountries: ['us', 'gb', 'ca'], // Preferencia por países
    separateDialCode: true, // Muestra el código de país por separado
  });
