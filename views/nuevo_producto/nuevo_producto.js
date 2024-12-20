document.addEventListener("DOMContentLoaded", function() {
    const existenciasInput = document.getElementById("existencias");
    const precioInput = document.getElementById("precio");
    const reordenInput = document.getElementById("reorden");
  
    existenciasInput.addEventListener("input", function() {
      validarNumeroPositivo(existenciasInput);
    });
  
    precioInput.addEventListener("input", function() {
      validarNumeroPositivo(precioInput);
    });
  
    reordenInput.addEventListener("input", function() {
      validarNumeroPositivo(reordenInput);
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