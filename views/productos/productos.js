
function cargarProductos(url, opciones) {
  return fetch(url, opciones)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error en la solicitud: " + response.status);
      }
      return response.json();
    })
    .then((data) => {
      

    })
    .catch((error) => {
      // Manejo de errores
      console.error("Error de red:", error);
    });
}

// Llamas a la función cargarProductos con la URL y opciones deseadas
const url = "/proudcto-eliminar";
const opciones = {
  method: "DELETE",
  // Otras opciones, como encabezados, se pueden configurar aquí
};
