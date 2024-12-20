document.addEventListener("DOMContentLoaded", function() {
    const telfonoInput = document.getElementById("telefono");
  
    telfonoInput.addEventListener("input", function() {
      validarNumeroPositivo(telefonoInput);
    });

    function validarNumeroPositivo(input) {
      const valor = input.value;
      if (!/^(\+|-)?\d+(\.\d+)?$/.test(valor) || parseFloat(valor) < 0) {
        input.setCustomValidity("Ingrese un numero positivo");
      } else {
        input.setCustomValidity("");
      }
    }
  });
